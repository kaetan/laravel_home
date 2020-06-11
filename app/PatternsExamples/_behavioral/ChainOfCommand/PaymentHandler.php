<?php


namespace App\PatternsExamples\_behavioral\ChainOfCommand;


class PaymentHandler extends OrderHandlerAbstract
{
    public function handle($request)
    {
        // Принимаем оплату от пользователя
        // Если удалось, идем дальше
        $this->nextHandler->handle($request);
        return $request;
    }
}
