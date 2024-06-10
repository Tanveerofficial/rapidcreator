<?php

namespace App\Http\Controllers;

use App\Models\{Csv_File, Font};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\DesignCreating;

class ImageProcessing extends Controller
{
    //===================using Trait================
    use DesignCreating;
    //===================using Trait================
    public function getting_csv_data($file)
    {
        $csv_file = Csv_File::where('csv_file', $file)->first();
        $mainDirectory = "CSV_FILES";
        $subDirectory = Auth::user()->id;
        $csvDirectory = ucfirst($csv_file->csv_name);
        $csvFilePath = $mainDirectory . "/" . $subDirectory . "/" . $csvDirectory . "/";
        $filePath = $csvFilePath . $file;
        if (($handle = fopen($filePath, 'r')) !== false) {
            fgetcsv($handle, 1000, ',');
            $array_data = [];
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $array_data[] = $data;
            }
            fclose($handle);
            return response()->json([
                "message" => 200,
                "data" => $array_data,
            ]);
        } else {
            echo 'Error opening the CSV file';
        }
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
    public function applyTextPosition(Request $request)
    {
        $checkResponse = $this->designCreating($request);
        if ($checkResponse['message'] == 200) {
            return response()->json([
                'success' => true,
                'message' => 200,
                'template' => $checkResponse['template_id'],
            ]);
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
    public function getting_font_effect(Request $request, $fontFamily)
    {
        if ($request->font_type == "google") {
            $apiKey = 'AIzaSyC6H1NGVqEH2u0epLKZEu5wk4Oj3kd_a4Y';
            $url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $apiKey;
            $fontFamily = $fontFamily;
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

                return response()->json([
                    "message" => 200,
                    "variants" => $variants,
                ]);
            }
        } else {
            $font = Font::where('font_name', $fontFamily)->first();
            $variants = [];
            $extractPath = './font/' . Auth::user()->id . "/";
            $variants[$extractPath . "/" . $font->font_file] = $font->font_name;
            return response()->json([
                "message" => 200,
                "variants" => $variants,
            ]);
        }
    }
}
