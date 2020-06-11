<?php


namespace App\PatternsExamples\Bridge;


class HowThisWorks
{
    public function composeArmor()
    {
        $armorClass = new HeavyClass();
        $bodyArmor = new BodyArmor($armorClass);

        $totalDefense = $bodyArmor->getDefence();
    }
}
