<?php


namespace App\PatternsExamples\Bridge;


interface Armor
{
    public function __construct(ArmorClass $armorClass);

    public function getDefence();
}
