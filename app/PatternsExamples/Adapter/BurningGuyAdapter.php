<?php


namespace App\PatternsExamples\Adapter;


class BurningGuyAdapter implements LightSource
{
    protected $burningGuy;

    public function __construct(BurningGuyAbstract $burningGuy)
    {
        $this->burningGuy = $burningGuy;
    }

    public function getLightRadius()
    {
        $intensityToLightRadius = [
            BurningGuyAbstract::BURNING_INTENSITY_HIGH => 20,
            BurningGuyAbstract::BURNING_INTENSITY_MEDIUM => 10,
            BurningGuyAbstract::BURNING_INTENSITY_LOW => 5,
        ];

        return $intensityToLightRadius[$this->burningGuy->getBurningIntensity()];
    }
}
