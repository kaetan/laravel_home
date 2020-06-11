<?php


namespace App\PatternsExamples\Decorator;


class SecondDishOrder extends OrderDecoratorAbstract
{
    public function getCost()
    {
        $addition = 18;
        return $this->order->getCost() + $addition;
    }

    public function getDetails()
    {
        $addition = 'Второе блюдо.';
        return $this->order->getDetails() . ' ' . $addition;
    }

}
