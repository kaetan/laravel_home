<?php


namespace App\PatternsExamples\Decorator;


class BasicOrder implements OrderInterface
{
    public function getCost()
    {
        return 10;
    }

    public function getDetails()
    {
        return 'Бронирование столика.';
    }
}
