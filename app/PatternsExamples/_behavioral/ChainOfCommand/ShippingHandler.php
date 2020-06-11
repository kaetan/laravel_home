<?php


namespace App\PatternsExamples\_behavioral\ChainOfCommand;


class ShippingHandler extends OrderHandlerAbstract
{
    public function handle($request)
    {
        // Подготовим заявку на доставку
        // Если все ок, идем дальше
        $this->nextHandler->handle($request);
        return $request;
    }
}
