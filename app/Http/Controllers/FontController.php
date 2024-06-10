<?php

namespace App\Http\Controllers;

use App\Models\{Font};
use App\Http\Requests\{StoreFontRequest, UpdateFontRequest};
use Illuminate\Support\Facades\{Auth, File};
use ZipArchive;

class FontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allfonts = Font::where('added_from', Auth::user()->id)->latest()->get();
        return view('Fonts.view', compact("allfonts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Fonts.upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFontRequest $request)
    {
        try {
            $userId = Auth::user()->id;
            $mainDirectory = "font";
            $subDirectory = $userId;

            if ($request->file_type == "zip") {
                return $this->handleZipFile($request, $mainDirectory, $subDirectory, $userId);
            } else {
                return $this->handleTtfFiles($request, $mainDirectory, $subDirectory, $userId);
            }
        } catch (\Exception $e) {
            return response()->json([
                'module' => 'font',
                'message' => 'unexpected_error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function handleZipFile($request, $mainDirectory, $subDirectory, $userId)
    {
        $zipFileDirectory = "zip_files";
        $this->createDirectory($mainDirectory);
        $this->createDirectory($zipFileDirectory);
        $this->createDirectory("$mainDirectory/$subDirectory");

        $zipFile = $request->file('font_file_zip');
        $originalName = $zipFile->getClientOriginalName();
        $filename = rand() . '.' . pathinfo($originalName, PATHINFO_EXTENSION);
        $zipFile->move($zipFileDirectory, $filename);
        $zipPath = "$zipFileDirectory/$filename";

        $zip = new ZipArchive();
        if ($zip->open($zipPath) === TRUE) {
            $extractPath = "$mainDirectory/$subDirectory";
            $this->createDirectory($extractPath);
            $zip->extractTo($extractPath);

            $nonTtfFound = false;
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $fileName = $zip->getNameIndex($i);
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                if ($fileExtension != "ttf") {
                    $nonTtfFound = true;
                    break;
                }
            }

            if ($nonTtfFound) {
                $zip->close();
                File::delete($zipPath);
                return response()->json([
                    'module' => 'font',
                    'message' => 'not_ttf'
                ]);
            }

            for ($i = 0; $i < $zip->numFiles; $i++) {
                $fileName = $zip->getNameIndex($i);
                if (stripos($fileName, 'italic') === false && is_string($fileName)) {
                    $this->saveFontData($request, $fileName, $userId);
                }
            }

            $zip->close();
            File::delete($zipPath);

            return response()->json([
                "message" => 200,
                "module" => "font",
            ]);
        } else {
            return response()->json(['module' => 'font', 'message' => 'zip_open_error'], 500);
        }
    }

    private function handleTtfFiles($request, $mainDirectory, $subDirectory, $userId)
    {
        $files = $request->file('font_file_ttf');
        foreach ($files as $file) {
            $ttfFilename = $file->getClientOriginalName();
            $file->move("$mainDirectory/$subDirectory/", $ttfFilename);
            $this->saveFontData($request, $ttfFilename, $userId);
        }

        return response()->json([
            "message" => 200,
            "module" => "font",
        ]);
    }

    private function saveFontData($request, $fileName, $userId)
    {
        $input = $request->all();
        $input['font_file'] = $fileName;
        $input['font_name'] = pathinfo($fileName, PATHINFO_FILENAME);
        $input['font_file_status'] = 1;
        $input['date'] = date('Y-m-d');
        $input['added_from'] = $userId;
        Font::updateOrCreate(
            ['font_name' => $input['font_name']],
            $input
        );
    }

    private function createDirectory($path)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $font_File = Font::findOrFail($id);
        $status = $font_File->font_file_status;
        if ($status == 1) {
            Font::where('id', $font_File->id)->update([
                "font_file_status" => 0,
            ]);
        } else {
            Font::where('id', $font_File->id)->update([
                "font_file_status" => 1,
            ]);
        }
        $font_File = Font::findOrFail($id);
        return response()->json([
            "message" => $font_File,
            "module" => "font",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Font $font)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFontRequest $request, Font $font)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $font_file = Font::where('id', $id)->first();
        $filePath = './font/' . Auth::user()->id . "/" . $font_file->font_file;
        if (File::delete($filePath)) {
            $font_file->delete();
            return response()->json([
                "message" => 200,
            ]);
        }
    }
    public function downloadFont($filename)
    {
        $font = Font::where('font_file', $filename)->first();
        $filePath = './font/' . Auth::user()->id . "/" . $filename;
        if ($filePath) {
            return response()->download($filePath);
        } else {
            return response()->json([
                "message" => "Sorry File is not Found in the Font Directory...!",
                "status" => 404,
            ]);
        }
    }
    public  function  fontsDownload()
    {
        $zipFileName = 'Fonts-' . date('d M, Y') . '.zip';
        $zipFilePath = $zipFileName;
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $fonts = Font::where('added_from', Auth::user()->id)->latest()->get();
            foreach ($fonts as $font) {
                $filePath = "font/" . Auth::user()->id . "/" . $font->font_file;
                if (File::exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                } else {
                    return "File not found: $filePath";
                }
            }
            $zip->close();
        } else {
            return "Failed to create zip file.";
        }
        if (File::exists($zipFilePath)) {
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return "Failed to create zip file.";
        }
    }
}
