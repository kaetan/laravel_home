<?php


namespace App\PatternsExamples\Adapter;


class Torch implements LightSource
{
    const BASE_LIGHT_RADIUS = 10;

    public function getLightRadius()
    {
        return self::BASE_LIGHT_RADIUS;
    }
}
