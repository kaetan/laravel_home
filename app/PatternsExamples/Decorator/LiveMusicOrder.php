<?php


namespace App\PatternsExamples\Decorator;


class LiveMusicOrder extends OrderDecoratorAbstract
{
    public function getCost()
    {
        $addition = 100;
        return $this->order->getCost() + $addition;
    }

    public function getDetails()
    {
        $addition = 'Живое исполнение душевной музыки.';
        return $this->order->getDetails() . ' ' . $addition;
    }
}
