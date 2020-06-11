<?php


namespace App\PatternsExamples\Bridge;


class BodyArmor implements Armor
{
    const BASE_DEFENCE = 10;

    protected $armorClass;

    public function __construct(ArmorClass $armorClass)
    {
        $this->armorClass = $armorClass;
    }

    public function getDefence()
    {
        $modifier = $this->armorClass->getClassModifier();

        return self::BASE_DEFENCE * $modifier;
    }
}
