<?php

namespace App\Http\Controllers;

use App\Models\BlankImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File};

class BlankImageController extends Controller
{
    public  function  index()
    {
        $allblanktemplates = BlankImage::where('added_from', Auth::user()->id)->latest()->paginate(12);
        return view('Blank.view', compact("allblanktemplates"));
    }
    public  function  upload()
    {
        return view('Blank.upload');
    }
    public function store(Request $request)
    {
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image_path));
        if ($imageData === false) {
            return response()->json(['success' => false, 'message' => 'Failed to decode image data.'], 400);
        }
        $extension = $this->getImageExtension($request->image_path);
        $folderName = './templates/uploads';
        $directoryPath = $folderName;
        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
        $imageFileName = uniqid() . '.' . $extension;
        $imageFilePath = $directoryPath . '/' . $imageFileName;
        if (!file_put_contents($imageFilePath, $imageData)) {
            return response()->json(['success' => false, 'message' => 'Failed to save image file.'], 500);
        }
        $positionX = $request->data[0]['positionX'];
        $positionY = $request->data[0]['positionY'];
        $containerWidth = $request->data[0]['containerWidth'];
        $containerHeight = $request->data[0]['containerHeight'];
        $currentWidth = $request->data[0]['currentWidth'];
        $currentHeight = $request->data[0]['currentHeight'];
        BlankImage::create([
            "position_x" => $positionX,
            "position_y" => $positionY,
            "container_width" => $containerWidth,
            "container_height" => $containerHeight,
            "image_width" => $currentWidth,
            "image_height" => $currentHeight,
            "image_path" => $imageFilePath,
            "added_from" => Auth::user()->id,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }

    private function getImageExtension($dataUri)
    {
        $matches = [];
        if (preg_match('#^data:image/(\w+);base64,#i', $dataUri, $matches)) {
            return $matches[1];
        }
        return 'png';
    }
    public  function  destroy($id)
    {
        $template = BlankImage::find($id);
        File::delete($template->image_path);
        $template->delete();
        return response()->json([
            "message" => "product",
        ]);
    }
    public function  details($id)
    {
        $template = BlankImage::find($id);
        return $template;
    }
    public function  edit($id)
    {
        $template = BlankImage::find($id);
        return view('Blank.edit', compact("template"));
    }
    public function update(Request $request)
    {
        $positionX = $request->data[0]['positionX'];
        $positionY = $request->data[0]['positionY'];
        $containerWidth = $request->data[0]['containerWidth'];
        $containerHeight = $request->data[0]['containerHeight'];
        $currentWidth = $request->data[0]['currentWidth'];
        $currentHeight = $request->data[0]['currentHeight'];
        BlankImage::where('id', $request->input('id'))->update([
            "position_x" => $positionX,
            "position_y" => $positionY,
            "container_width" => $containerWidth,
            "container_height" => $containerHeight,
            "image_width" => $currentWidth,
            "image_height" => $currentHeight,
            "added_from" => Auth::user()->id,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
}
