<?php


namespace App\PatternsExamples\_behavioral\ChainOfCommand;


interface OrderHandlerInterface
{
    public function setNext(OrderHandlerInterface $handler);

    public function handle($request);
}
