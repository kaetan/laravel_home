<?php


namespace App\PatternsExamples\Decorator;


class HowThisWorks
{
    public function decorateOne()
    {
        $order = new BasicOrder();
        $order = new FirstDishOrder($order);
        $order = new SecondDishOrder($order);

        return 'Содержимое заказа: ' . $order->getDetails() . ' Стоимость заказа: ' . $order->getCost() . '$.';
    }

    public function decorateTwo()
    {
        $order = new BasicOrder();
        $order = new LiveMusicOrder($order);
        $order = new ThirdDishOrder($order);

        return 'Содержимое заказа: ' . $order->getDetails() . ' Стоимость заказа: ' . $order->getCost() . '$.';
    }
}
