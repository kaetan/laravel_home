<?php


namespace App\PatternsExamples\Decorator;


class ThirdDishOrder extends OrderDecoratorAbstract
{
    public function getCost()
    {
        $addition = 10;
        return $this->order->getCost() + $addition;
    }

    public function getDetails()
    {
        $addition = 'Десерт.';
        return $this->order->getDetails() . ' ' . $addition;
    }
}
