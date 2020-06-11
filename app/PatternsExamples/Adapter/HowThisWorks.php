<?php


namespace App\PatternsExamples\Adapter;


class HowThisWorks
{
    public function calculateLightRadius()
    {
        $burningGuy = new RandomBurningGuy();
        $burningGuyAdapter = new BurningGuyAdapter($burningGuy);

        $torch = new Torch();

        $totalLightRadius = $torch->getLightRadius() + $burningGuyAdapter->getLightRadius();

        return $totalLightRadius;
    }
}
