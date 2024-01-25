<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use SebastianBergmann\Template\Template;

class ImageProcessing extends Controller
{
    public function image_processing()
    {
        // $apiKey = 'AIzaSyC6H1NGVqEH2u0epLKZEu5wk4Oj3kd_a4Y';
        // $url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $apiKey;
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($ch);
        // if (curl_errno($ch)) {
        //     echo 'Curl error: ' . curl_error($ch);
        // }
        // curl_close($ch);
        // $data = json_decode($response, true);
        // if ($data === null) {
        //     echo 'Error decoding JSON';
        // } else {
        //     $font_families = $data['items'];
        // }
        $filePath = "./assets/js/font_families.json";
        $content = file_get_contents($filePath);
        $fontFamiliesData = json_decode($content, true);
        $fontFamilies = $fontFamiliesData['fontFamilies'];
        $csvfilesPath = "./csv_files/";
        $files = scandir($csvfilesPath);
        $csv_files = array_diff($files, ['.', '..']);
        $compact = compact("fontFamilies", "csv_files");
        return view('Image.process')->with($compact);
    }
    public function getting_csv_data($file)
    {
        $filePath = './csv_files/' . $file;
        if (($handle = fopen($filePath, 'r')) !== false) {
            fgetcsv($handle, 1000, ',');
            $array_names = [];
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $array_names[] = $data;
            }
            fclose($handle);
            return response()->json([
                "message" => 200,
                "data" => $array_names,
            ]);
        } else {
            echo 'Error opening the CSV file';
        }
    }
    public function addDivToImage(Request $request)
    {
        $imageData = $request->input('imageData');
        $imageName = $request->input('imageName');
        $originalImagePath = public_path('images/template.png');
        $originalImage = Image::make($originalImagePath);
        $imagePath = public_path('templates/' . $imageName);
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = base64_decode($imageData);
        File::put($imagePath, $imageData);
        $image = Image::make($imagePath);
        $image->resize($originalImage->width(), $originalImage->height(), function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save($imagePath);

        return response()->json(['message' => 'Image saved and processed successfully']);
        // $imageData = $request->input('imageData');
        // $imageName = $request->input('imageName');
        // $imagePath = public_path('templates/' . $imageName);
        // $imageData = str_replace('data:image/png;base64,', '', $imageData);
        // $imageData = base64_decode($imageData);
        // File::put($imagePath, $imageData);
        // $image = Image::make($imagePath);
        // $image->resize(451, 395);
        // $image->save($imagePath);
        // return response()->json(['message' => 'Image saved and processed successfully']);

        // $imageData = $request->input('imageData');
        // $imageName = $request->input('imageName');
        // $originalImagePath = public_path('images/template.png');
        // $originalImage = Image::make($originalImagePath);
        // $imagePath = public_path('templates/' . $imageName);
        // $imageData = str_replace('data:image/png;base64,', '', $imageData);
        // $imageData = base64_decode($imageData);
        // File::put($imagePath, $imageData);
        // $image = Image::make($imagePath);
        // $image->resize($originalImage->width(), $originalImage->height());
        // $image->save($imagePath);
        // return response()->json(['message' => 'Image saved and processed successfully']);

        // // Resize the image

        // // Create a greyscale mask
        // $greyscaleMask = $image->greyscale()->invert();

        // // Apply the mask to the image
        // $image->mask($greyscaleMask, false);

        // // Save the processed image
        // $image->save($imagePath);

    }
    public function gettingData($title)
    {
        if (str_contains($title, '.csv')) {
            $filePath = './csv_files/' . $title;

            if (($handle = fopen($filePath, 'r')) !== false) {
                fgetcsv($handle, 1000, ',');
                $array_names = [];

                while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                    $array_names[] = $data;
                }

                fclose($handle);

                return response()->json([
                    "success" => true,
                    "message" => "csv loaded",
                    "data" => $array_names,
                ]);
            } else {
                return response()->json([
                    "success" => false,
                    "message" => "Error opening the CSV file",
                ], 500);
            }
        } else {
            return response()->json([
                "success" => true,
                "message" => "title",
                "data" => $title,
            ]);
        }
    }
    public function imageMaking(Request $request)
    {
        return $request->all();
        // $url = $request->image_data;
        // $type = $request->type;
        // $originalImagePath = public_path('images/template.png');
        // $templatesDirectory = public_path('templates');
        // if (!File::isDirectory($templatesDirectory)) {
        //     File::makeDirectory($templatesDirectory);
        // }
        // if (File::exists($url)) {
        //     $image = Image::make($url);
        // } else {
        //     return response()->json([
        //         'error' => true,
        //         'message' => 'Invalid image source or file not found.',
        //     ]);
        // }

        // $originalImage = Image::make($originalImagePath);
        // $image->resize($originalImage->width(), $originalImage->height());
        // $image->alphaBlending(false);
        // $image->mask($image->greyscale());

        // $randomNumber = rand(100000, 900000);
        // $outputFileName = $randomNumber . '.png';
        // $outputPath = $templatesDirectory . '/' . $outputFileName;

        // $image->save($outputPath);
        // return 200;
        // $template = new Template();
        // $template->template = asset();
        // $template->save();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Image processed successfully',
        //     // 'processed_image_url' => $template->template,
        // ]);
    }
    public function applyTextPosition(Request $request)
    {
        return $request->all();
        // $x = $request->input('x');
        // $y = $request->input('y');
        // $image = Image::make(public_path('./images/template.png'));
        // $image->text('Your text', $x, $y, function ($font) {
        //     $font->file(public_path('path/to/your/font.ttf'));
        //     $font->size(50);
        //     $font->color('#000');
        //     $font->align('left');
        //     $font->valign('top');
        // });
        // $image->save(public_path('./templates/modified.png'));
        // return response()->json(['success' => true]);
    }
}
