<?php


namespace App\PatternsExamples\Adapter;


abstract class BurningGuyAbstract
{
    const BURNING_INTENSITY_HIGH = 'Very intense burning!',
        BURNING_INTENSITY_MEDIUM = 'Decent burning.',
        BURNING_INTENSITY_LOW = 'Almost extinguished.';

    abstract public function getBurningIntensity();
}
