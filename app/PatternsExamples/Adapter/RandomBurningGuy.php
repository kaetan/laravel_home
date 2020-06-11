<?php


namespace App\PatternsExamples\Adapter;


class RandomBurningGuy extends BurningGuyAbstract
{
    public function getBurningIntensity()
    {
        return self::BURNING_INTENSITY_HIGH;
    }
}
