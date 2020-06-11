<?php


namespace App\PatternsExamples\Decorator;


abstract class OrderDecoratorAbstract implements OrderInterface
{
    protected $order;

    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }

    abstract public function getCost();

    abstract public function getDetails();

}
