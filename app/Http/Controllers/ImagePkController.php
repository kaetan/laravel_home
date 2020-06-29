<?php

namespace App\Http\Controllers;


use ImagePk\ImagePk;

class ImagePkController extends Controller
{
    public function applyWm()
    {
        $imagePath = base_path() . '/public/img/Lighthouse.jpg';
        $watermarkPath = base_path() . '/public/img/logo.png';
        $resultPath = base_path() . '/public/img/';

        $service = new ImagePk();
        $img = $service->applyWatermark("https://s0.rbk.ru/v6_top_pics/media/img/0/50/755858203490500.jpeg", "https://s0.rbk.ru/v6_top_pics/media/img/0/50/755858203490500.jpeg", $resultPath);
        $img = $service->applyWatermark($resultPath, "https://s0.rbk.ru/v6_top_pics/media/img/0/50/755858203490500.jpeg", $resultPath);
        $img = $service->applyWatermark($resultPath, "https://s0.rbk.ru/v6_top_pics/media/img/0/50/755858203490500.jpeg", $resultPath);
        $img = $service->applyWatermark($resultPath, "https://s0.rbk.ru/v6_top_pics/media/img/0/50/755858203490500.jpeg", $resultPath);
    }

}
