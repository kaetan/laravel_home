<?php


namespace App\PatternsExamples\_behavioral\ChainOfCommand;


class FinalHandler extends OrderHandlerAbstract
{
    public function handle($request)
    {
        // Проверяем, что все окей
        return $request;
    }
}
