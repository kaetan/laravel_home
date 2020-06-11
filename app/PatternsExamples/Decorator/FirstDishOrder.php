<?php


namespace App\PatternsExamples\Decorator;


class FirstDishOrder extends OrderDecoratorAbstract
{
    public function getCost()
    {
        $addition = 15;
        return $this->order->getCost() + $addition;
    }

    public function getDetails()
    {
        $addition = 'Первое блюдо.';
        return $this->order->getDetails() . ' ' . $addition;
    }
}
