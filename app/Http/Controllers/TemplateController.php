<?php

namespace App\Http\Controllers;

use App\Models\{BlankImage, MockupDesign, Template};
use App\Http\Requests\{StoreTemplateRequest, UpdateTemplateRequest};
use App\Models\{Csv_File, Design, Font};
use Illuminate\Support\Facades\{Auth, DB, File};
use Illuminate\Support\Str;
use ZipArchive;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alltemplates = Template::where('added_from', Auth::user()->id)->latest()->paginate(12);
        $array_designs = [];
        $array_designs_making = [];
        foreach ($alltemplates as $templates) {
            $allDesignMaking = Design::where('template_id', $templates->id)->where('design_status', 0)->count();
            if ($allDesignMaking) {
                $array_designs_making[$templates->id] = $allDesignMaking;
            } else {
                $array_designs_making[$templates->id] = $allDesignMaking;
            }
            $design = Design::where('template_id', $templates->id)->first();
            if ($design) {
                $array_designs[$templates->id] = $design;
                continue;
            }
        }
        return view('Templates.view', compact("alltemplates", "array_designs", "array_designs_making"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $csv_files = Csv_File::where('added_from', Auth::user()->id)->where('csv_file_status', 1)->latest()->get();
        $compact = compact("csv_files");
        return view('Templates.add')->with($compact);
        // ==================now code ================================
        // ==================alerady code ============================
        // $filePath = "./assets/js/font_families.json";
        // $content = file_get_contents($filePath);
        // $fontFamiliesData = json_decode($content, true);
        // $fontFamilies = $fontFamiliesData['fontFamilies'];
        // $csvfilesPath = "./csv_files/";
        // $files = scandir($csvfilesPath);
        // $csv_files = array_diff($files, ['.', '..']);
        // $compact = compact("fontFamilies", "csv_files");
        // return view('Templates.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTemplateRequest $request)
    {
        $input = $request->all();
        if ($request->hasfile("template_picture")) {
            $template = $request->file("template_picture");
            $extension = $template->getClientOriginalExtension();
            $filename = Str::slug($input['template_title'], '-') . "." . $extension;
            $template->move("uploads/", $filename);
            $msg = 200;
        }
        if ($msg == 200) {
            $input['template_picture'] = $filename;
            Template::create($input);
            return response()->json([
                "message" => 200,
                "module" => "template",
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        $status = $template->template_status;
        if ($status == 1) {
            Template::where('id', $template->id)->update([
                "template_status" => 2,
            ]);
        } else {
            Template::where('id', $template->id)->update([
                "template_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $template,
            "module" => "template",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTemplateRequest $request, Template $template)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        if ($template->delete()) {
            return response()->json([
                "message" => "template",
            ]);
        }
    }
    public function gettingData()
    {
        $alltempltes = Template::whereNull('deleted_at')->latest()->get();
        return response()->json([
            "data" => $alltempltes,
        ]);
    }
    public function getFontType($value)
    {
        if ($value == "google") {
            $apiKey = 'AIzaSyC6H1NGVqEH2u0epLKZEu5wk4Oj3kd_a4Y';
            $url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $apiKey;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            }
            curl_close($ch);
            $data = json_decode($response, true);
            if ($data === null) {
                echo 'Error decoding JSON';
            } else {
                $fontFamilies = array_column($data['items'], 'family');
            }
            return response()->json([
                "data" => $fontFamilies,
            ]);
        } else {
            $fonts = Font::where(['added_from' => Auth::user()->id, "font_file_status" => 1])->get();
            $fontFamilies = $fonts->pluck('font_name')->toArray();
            return response()->json([
                "data" => $fontFamilies,
            ]);
        }
    }
    public function designsDownload($id)
    {
        $directory = 'designs';
        if (!File::exists($directory)) {
            return "Directory not found.";
        }
        $zipFileName = 'Templates-' . date('d M, Y') . '.zip';
        $zipFilePath = $zipFileName;
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $files = Design::where('template_id', $id)->get();
            if ($files->count() > 0) {
                foreach ($files as $file) {
                    $filePath = $file->design_image;
                    if (File::exists($filePath)) {
                        $zip->addFile($filePath, basename($filePath));
                    } else {
                        return "File not found: $filePath";
                    }
                }
                $zip->close();
            } else {
                return "No design images found for template $id.";
            }
        } else {
            return "Failed to create zip file.";
        }
        if (File::exists($zipFilePath)) {
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return "Failed to create zip file.";
        }
    }
    public function productsDownload($id)
    {
        $directory = 'designs';
        if (!File::exists($directory)) {
            return "Directory not found.";
        }
        $zipFileName = 'Products-' . date('d M, Y') . '.zip';
        $zipFilePath = $zipFileName;
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $files = MockupDesign::where('template_id', $id)->get();
            if ($files->count() > 0) {
                foreach ($files as $file) {
                    $filePath = $file->designed_mokup;
                    if (File::exists($filePath)) {
                        $zip->addFile($filePath, basename($filePath));
                    } else {
                        return "File not found: $filePath";
                    }
                }
                $zip->close();
            } else {
                return "No design images found for template $id.";
            }
        } else {
            return "Failed to create zip file.";
        }
        if (File::exists($zipFilePath)) {
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return "Failed to create zip file.";
        }
    }
    public function getDesignDetails($id)
    {
        $alldesigns = Design::where('template_id', $id)->paginate(12);
        return view('Templates.detail', compact("alldesigns"));
    }
    public  function designProducts($id)
    {
        $alldesigns = Design::where('template_id', $id)->get();
        $template = BlankImage::find(1);
        $allMockups = MockupDesign::where('template_id', $id)->get();
        $array_designs_id = [];
        foreach ($allMockups as $mockup) {
            $array_designs_id[] = $mockup->design_id;
        }
        return view('Templates.product_create', compact("alldesigns", "template", "allMockups", "array_designs_id"));
    }

    public function make_design_products(\Illuminate\Http\Request $request)
    {
        $ids = json_decode($request->ids, true);
        foreach ($ids as $id) {
            $positionX = $request->position_x;
            $positionY = $request->position_y;
            $imageFilePath = str_replace("https://rapidcreator.ibexstack.com/", "", $request->mokup_path);
            $blankImage = BlankImage::where('image_path', $imageFilePath)->first();
            $blankImageId = $blankImage ? $blankImage->id : 0;
            $design = Design::where('id', $id)->first();
            $designId = $design ? $design->id : 0;
            MockupDesign::create([
                "mokup_id" => $blankImageId,
                "template_id" => $request->template_id,
                "design_id" => $designId,
                "mokup_current_width" => $request->mokup_current_width,
                "mokup_current_height" => $request->mokup_current_height,
                "position_x" => $positionX,
                "position_y" => $positionY,
                "design_width" => $request->design_width,
                "design_height" => $request->design_height,
                "designed_mokup" => null,
                "mokup_status" => 0,
            ]);
        }
        return response()->json([
            "message" => 200,
        ]);
    }
    public function get_all_mokups()
    {
        $allBlankDesigns = BlankImage::where('added_from', Auth::user()->id)->latest()->get();
        return response()->json([
            "data" => $allBlankDesigns,
        ]);
    }
    public function select_mokup(\Illuminate\Http\Request $request)
    {
        $mokup = BlankImage::where('id', $request->mokup_id)->first();
        $alldesigns = Design::where('template_id', $request->template_id)->get();
        $allMockups = MockupDesign::where('template_id', $request->template_id)
            ->where('mokup_id', $request->mokup_id)->get();
        $array_designs_id = [];
        foreach ($allMockups as $mockup) {
            $array_designs_id[$mockup->design_id] = "checked";
        }
        return response()->json([
            "mokup" => $mokup,
            "designs" => $alldesigns,
            "array_designs_id" => $array_designs_id,
        ]);
    }
    public function  checeked_all($id)
    {
        $firstMokup = Design::where('template_id', $id)->first();
        return $firstMokup;
    }
    public function checked_single($id)
    {
        $checkedMokup = Design::where('id', $id)->first();
        return $checkedMokup;
    }
    private function getImageExtension($dataUri)
    {
        $matches = [];
        if (preg_match('#^data:image/(\w+);base64,#i', $dataUri, $matches)) {
            return $matches[1];
        }
        return 'png';
    }
    public  function designEdit($id)
    {
        $template = DB::table('templates as t')
            ->join('designs as d', 'd.template_id', '=', 't.id')
            ->where('t.id', $id)
            ->orderBy('d.updated_at', 'desc')
            ->first();
        $csv_files = Csv_File::where('added_from', Auth::user()->id)->where('csv_file_status', 1)->latest()->get();
        if ($template->font_type == "google") {
            $apiKey = 'AIzaSyC6H1NGVqEH2u0epLKZEu5wk4Oj3kd_a4Y';
            $url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $apiKey;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            }
            curl_close($ch);
            $data = json_decode($response, true);
            if ($data === null) {
                echo 'Error decoding JSON';
            } else {
                $getFontFamilies = array_column($data['items'], 'family');
            }
        } else {
            $fonts = Font::where(['added_from' => Auth::user()->id, "font_file_status" => 1])->get();
            $getFontFamilies = $fonts->pluck('font_name')->toArray();
        }
        if ($template->font_type == "google") {
            $apiKey = 'AIzaSyC6H1NGVqEH2u0epLKZEu5wk4Oj3kd_a4Y';
            $url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $apiKey;
            $fontFamily = $template->font_family;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            }
            curl_close($ch);
            $data = json_decode($response, true);
            if ($data === null) {
                echo 'Error decoding JSON';
            } else {
                $fontFamilies = $data['items'];
                $variants = [];
                $fontFiles = [];
                foreach ($fontFamilies as $font) {
                    if ($font['family'] == $fontFamily) {
                        foreach ($font['variants'] as $variant) {
                            if (strpos($variant, 'italic') === false) {
                                $weight = filter_var($variant, FILTER_SANITIZE_NUMBER_INT);
                                if ($weight < 800) {
                                    // $variants[] = $variant;
                                    $fontFiles[$variant] = $font['files'][$variant];
                                }
                            }
                        }
                        break;
                    }
                }
                foreach ($fontFiles as $fileVariant => $fileUrl) {
                    $fontContent = file_get_contents($fileUrl);
                    if ($fontContent !== false) {
                        $fontDirectory = 'font/' . Auth::user()->id . "/";
                        if (!is_dir($fontDirectory . $fontFamily)) {
                            mkdir($fontDirectory . $fontFamily, 0755, true);
                        }
                        $fileName = $fontFamily . '-' . ucfirst($fileVariant) . '.ttf';
                        $filePath = $fontDirectory . "/" . $fontFamily . '/' . $fileName;
                        if (!file_exists($filePath)) {
                            file_put_contents($filePath, $fontContent);
                        }
                        $variants[$filePath] = $fontFamily . '-' . ucfirst($fileVariant);
                    } else {
                        echo 'Error downloading font file: ' . $fileUrl;
                    }
                }
            }
        } else {
            $font = Font::where('font_name', $fontFamily)->first();

            if (!$font) {
                return response()->json(['error' => 'Font not found'], 404);
            }

            $getFontFile = "./font/" . Auth::user()->id . "/" . $font->font_name . "/" . $font->font_file;
            if (!file_exists($getFontFile)) {
                return response()->json(['error' => 'Font file not found'], 404);
            }

            $zip = new ZipArchive;
            if ($zip->open($getFontFile) === TRUE) {
                $extractPath = './font/' . Auth::user()->id . "/" . $font->font_name . "/";
                if (!is_dir($extractPath)) {
                    mkdir($extractPath, 0777, true);
                }

                if ($zip->extractTo($extractPath)) {
                    $zip->close();
                    $extractedFileNames = array_diff(scandir($extractPath), array('.', '..'));
                    $variants = [];
                    foreach ($extractedFileNames as $fileName) {
                        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                        if ($fileExtension !== 'ttf') {
                            continue;
                        }
                        if (strpos($fileName, 'italic') !== false || strpos($fileName, 'Italic') !== false) {
                            continue;
                        }
                        $variants[$extractPath . "/" . $fileName] = str_replace(".ttf", "", $fileName);
                    }
                } else {
                    $zip->close();
                    return response()->json(['error' => 'Failed to extract the files'], 500);
                }
            } else {
                return response()->json(['error' => 'Failed to open the ZIP archive'], 500);
            }
        }
        $compact = compact("csv_files", "template", "getFontFamilies", "variants");
        return view('Templates.edit')->with($compact);
    }
    public  function  create_products()
    {
        $alltemplates = Template::where('added_from', Auth::user()->id)->latest()->paginate(12);
        $array_designs = [];
        foreach ($alltemplates as $templates) {
            $design = Design::where('template_id', $templates->id)->first();
            if ($design) {
                $array_designs[$templates->id] = $design;
                continue;
            }
        }
        return view('Templates.products', compact("alltemplates", "array_designs"));
    }
    public  function  all_products()
    {
        $alltemplates = Template::where('added_from', Auth::user()->id)->latest()->paginate(12);
        $getalltemplates = Template::where('added_from', Auth::user()->id)->latest()->get();
        $array_designs = [];
        $array_products = [];
        $templates_ids = [];
        foreach ($alltemplates as $templates) {
            $templates_ids[] = $templates->id;
            $design = Design::where('template_id', $templates->id)->first();
            if ($design) {
                $array_designs[$templates->id] = $design;
                continue;
            }
        }
        foreach ($getalltemplates as $templates) {
            $products = MockupDesign::where('template_id', $templates->id)->count();
            if ($products) {
                $array_products[$templates->id] = $products;
            } else {
                $array_products[$templates->id] = $products;
            }
        }
        return view('Templates.all_products', compact("alltemplates", "array_designs", "array_products"));
    }
    public function  template_products($template_id)
    {
        $productDesigns = MockupDesign::where('template_id', $template_id)->get();
        return $productDesigns;
        die();
    }
}
