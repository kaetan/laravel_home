<?php


namespace App\PatternsExamples\_behavioral\ChainOfCommand;


class WarehouseHandler extends OrderHandlerAbstract
{
    public function handle($request)
    {
        // Резервируем товар на складе
        // Если удалось, то вызываем следующий хэндлер
        $this->nextHandler->handle($request);
        return $request;
    }
}
