<?php

namespace App\Traits;

set_time_limit(0);

use App\Models\Design;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
//Trait for the Image Creation
trait DesignCreating
{
    public function designCreating($request)
    {
        $request->validate([
            "font_family" => 'required',
            "textEffect" => 'required',
        ], [
            "font_family.required" => 'Please Select the Font',
            "textEffect.required" => 'Please Select the Font Variant'
        ]);
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
        if ($request->id != "") {
            $template = Template::where('id', $request->id)->first();
            File::delete($template->template_picture);
            $allDesigns = Design::where('template_id', $template->id)->get();
            $removemessage = "";
            foreach ($allDesigns as $design) {
                File::delete($design->design_image);
                $removemessage = 200;
            }
            if ($removemessage == 200) {
                Design::where('template_id', $template->id)->delete();
                Template::where('id', $request->id)->update([
                    "template_picture" => $imageFilePath,
                    "container_position_left" => $request->containerPositionLeft,
                    "container_position_top" => $request->containerPositionTop,
                    "container_width" => $request->containerWidth,
                    "container_height" => $request->containerHeight,
                    "input_position_left" => $request->inputPositionLeft,
                    "input_position_top" => $request->inputPositionTop,
                    "input_width" => $request->inputWidth,
                    "input_height" => $request->inputHeight,
                    "input_font_size" => $request->fontSize,
                ]);
            }
        } else {
            $template = Template::create([
                "template_picture" => $imageFilePath,
                "date" => date('Y-m-d'),
                "container_position_left" => $request->containerPositionLeft,
                "container_position_top" => $request->containerPositionTop,
                "container_width" => $request->containerWidth,
                "container_height" => $request->containerHeight,
                "input_position_left" => $request->inputPositionLeft,
                "input_position_top" => $request->inputPositionTop,
                "input_width" => $request->inputWidth,
                "input_height" => $request->inputHeight,
                "input_font_size" => $request->fontSize,
                "added_from"=>Auth::user()->id,
            ]);
        }
        $templateId = $template->id;
        foreach ($request->screenshotData as $key => $data) {
            $text = $data['text'];
            if($request->fontType=="own"){
                $ttf_file = 'font/' . Auth::user()->id . "/" .  basename($request->textEffect);
            }else{
                $ttf_file = 'font/' . Auth::user()->id . "/" . $request->font_family . "/" .  basename($request->textEffect);
            }
            $fontSize = isset($data['fontSize']) ? $data['fontSize'] * 10 : 500;
//            $fontSize = $fontSize + 8;
            $positionX = $data['positionX'];
            $positionY = $data['positionY'];
            $percentage = 0.85;
            if ($data['inputdivHeight'] < 100 && $data['inputdivHeight'] >= 90) {
                $percentage = 0.82;
                $fontSize = $fontSize-12;
            }else if ($data['inputdivHeight'] < 90 && $data['inputdivHeight'] >= 80) {
                $percentage = 0.83;
                $fontSize = $fontSize-10;
            }else if ($data['inputdivHeight'] < 80 && $data['inputdivHeight'] >= 70) {
                $percentage = 0.82;
                $fontSize = $fontSize-8;
            }else if ($data['inputdivHeight'] < 70 && $data['inputdivHeight'] >= 60) {
                $percentage = 0.82;
                $fontSize = $fontSize-6;
            }else if ($data['inputdivHeight'] < 60 && $data['inputdivHeight'] >= 50) {
                $percentage = 0.82;
                $fontSize = $fontSize-4;
            }else if ($data['inputdivHeight'] < 50 && $data['inputdivHeight'] >= 40) {
                $percentage = 0.82;
                $fontSize = $fontSize-2;
            } else if ($data['inputdivHeight'] < 40 && $data['inputdivHeight'] >= 30) {
                $percentage = 0.82;
                $fontSize = $fontSize-2;
            } else if ($data['inputdivHeight'] < 30 && $data['inputdivHeight'] >= 20) {
                $percentage = 0.82;
                $fontSize = $fontSize+1;
            } else if ($data['inputdivHeight'] < 20 && $data['inputdivHeight'] >= 10) {
                $percentage = 0.82;
                $fontSize = $fontSize+1;
            }
            $textHeight = $data['inputdivHeight'] * $percentage;
            $positionY = $positionY + $textHeight;
            try {
                Design::create([
                    "title" => $text,
                    "csv_file" => $request->csv_file,
                    "font_type" => $request->font_type,
                    "font_family" => $request->font_family,
                    "variants" => basename($request->textEffect),
                    "font_size" => $fontSize,
                    "text_alignment" => $request->alignment,
                    "color" => $request->text_color,
                    "image_current_width" => $data['currentWidth'],
                    "image_current_height" => $data['currentHeight'],
                    "position_x" => $positionX,
                    "position_y" => $positionY,
                    "ttf_file" => $ttf_file,
                    "date" => date('Y-m-d'),
                    "design_status" => 0,
                    "template_id" => $templateId,
                    "added_from" => Auth::user()->id,
                ]);
                $msg = 200;
            } catch (\Exception $e) {
                dd($e->getMessage());
                $msg = 500;
            }
        }
        return [
            "message" => $msg,
            "template_id" => $templateId,
        ];
    }
}
