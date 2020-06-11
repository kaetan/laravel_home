<?php


namespace App\PatternsExamples\Bridge;


class HeavyClass implements ArmorClass
{
    const CLASS_MODIFIER = 3;

    public function getClassModifier()
    {
        return self::CLASS_MODIFIER;
    }
}
