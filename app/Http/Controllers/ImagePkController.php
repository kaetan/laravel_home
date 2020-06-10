<?php

namespace App\Http\Controllers;

use ImagePk\ImagePk;

class ImagePkController extends Controller
{
    public function applyWm()
    {
        $imagePath = base_path() . '/public/img/Lighthouse.jpg';
        $watermarkPath = base_path() . '/public/img/watermark.jpeg';
        $resultPath = base_path() . '/public/img/';

        $service = new ImagePk();
        $service->applyWatermark($imagePath, $watermarkPath, $resultPath);
    }

}
