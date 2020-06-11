<?php


namespace App\PatternsExamples\_behavioral\ChainOfCommand;


abstract class OrderHandlerAbstract implements OrderHandlerInterface
{
    protected $nextHandler;

    public function __construct()
    {
    }

    public function setNext(OrderHandlerInterface $handler)
    {
        $this->nextHandler = $handler;
    }

}
