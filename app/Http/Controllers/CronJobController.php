<?php

namespace App\Http\Controllers;

set_time_limit(0);

use App\Models\{BlankImage, Design, MockupDesign, Template};
use Illuminate\Support\Facades\{Auth, Log};
use Intervention\Image\ImageManagerStatic as Image;

class CronJobController extends Controller
{
    public function designMaking()
    {
        set_time_limit(0);
        ini_set('memory_limit', '1500M');
        $allDesigns = Design::where('design_status', 0)->get();
        $msg = 500;
        foreach ($allDesigns as $design) {
            try {
                $imageFilePath = Template::findOrFail($design->template_id)->template_picture;
                $extension = $this->getImageExtension($imageFilePath);

                $image = Image::make($imageFilePath);
                $originalWidth = $image->width();
                $originalHeight = $image->height();

                $ttf_file = $design->ttf_file;
                $color = $design->color;
                $positionX = $design->position_x;
                $positionY = $design->position_y;
                $text = $design->title;
                $fontSize = $design->font_size;

                $currentWidth = $image->width();
                $currentHeight = $image->height();

                $positionX *= $currentWidth / $design->image_current_width;
                $positionY *= $currentHeight / $design->image_current_height;

                $image->text($text, $positionX, $positionY, function ($font) use ($fontSize, $ttf_file, $color) {
                    $font->file($ttf_file);
                    $font->size($fontSize);
                    $font->color($color);
                });

                $image->resize($originalWidth, $originalHeight);

                $mainDirectory = "templates";
                $subDirectory = Auth::user()->id . "-Templates";

                if (!is_dir($mainDirectory)) {
                    mkdir($mainDirectory, 0777, true);
                }

                if (!is_dir($mainDirectory . "/" . $subDirectory)) {
                    mkdir($mainDirectory . "/" . $subDirectory, 0777, true);
                }

                $outputImageName = uniqid() . '.' . $extension;
                $outputPath = $mainDirectory . "/" . $subDirectory . "/" . $outputImageName;
                $image->save($outputPath);

                Design::where('id', $design->id)->update([
                    "design_image" => $outputPath,
                    "design_status" => 1,
                ]);
                $msg = 200;
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

        if ($msg == 200) {
            return response()->json([
                "message" => "Designs Created Successfully",
            ]);
        }

        return response()->json([
            "message" => "Failed to create designs",
        ], 500);
    }
    public function ProductMaking()
    {
        try {
            set_time_limit(0);
            ini_set('memory_limit', '1500M');
            $allMokups = MockupDesign::where('mokup_status', 0)->get();
            $msg = 500;
            foreach ($allMokups as $mokup) {
                try {
                    $positionX = $mokup->position_x;
                    $positionY = $mokup->position_y;
                    $imageFilePath = BlankImage::where('id', $mokup->mokup_id)->first()->image_path ?? "";
                    $imageFilePath = asset($imageFilePath);
                    $extension = $this->getImageExtension($imageFilePath);
                    $image = Image::make($imageFilePath);
                    $currentWidth = $image->width();
                    $currentHeight = $image->height();
                    $positionX = (int)($positionX * $currentWidth / $mokup->mokup_current_width);
                    $positionY = (int)($positionY * $currentHeight / $mokup->mokup_current_height);
                    $design = Design::find($mokup->design_id);
                    if (!$design) {
                        throw new \Exception('Design not found');
                    }
                    $watermarkImagePath = $design->design_image;
                    $watermark = Image::make($watermarkImagePath);
                    $watermark->resize($mokup->design_width * 10.15, $mokup->design_height * 10);
                    $image->insert($watermark, 'top-left', $positionX, $positionY);
                    $originalWidth = $image->width();
                    $originalHeight = $image->height();
                    $image->resize($originalWidth, $originalHeight);
                    $mainDirectory = "templates";
                    $subDirectory = Auth::user()->id . "-Templates";
                    if (!is_dir($mainDirectory)) {
                        mkdir($mainDirectory, 0777, true);
                    }
                    if (!is_dir($mainDirectory . "/" . $subDirectory)) {
                        mkdir($mainDirectory . "/" . $subDirectory, 0777, true);
                    }
                    $outputImageName = uniqid() . '.' . $extension;
                    $outputPath = $mainDirectory . "/" . $subDirectory . "/" . $outputImageName;
                    $image->save($outputPath);
                    MockupDesign::where('id', $mokup->id)->update([
                        "mokup_status" => 1,
                        "designed_mokup" => $outputPath,
                    ]);
                    $msg = 200;
                } catch (\Exception $e) {
                    Log::error('Error processing mokup id: ' . $mokup->id . ' - ' . $e->getMessage());
                }
            }
            if ($msg == 200) {
                return response()->json([
                    "message" => "Products Created Successfully",
                ]);
            }
            return response()->json([
                "message" => "Failed to create designs",
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    private function getImageExtension($dataUri)
    {
        $matches = [];
        if (preg_match('#^data:image/(\w+);base64,#i', $dataUri, $matches)) {
            return $matches[1];
        }
        return 'png';
    }
}
