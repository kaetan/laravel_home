<?php


namespace App\PatternsExamples\_behavioral\Command\ConcreteCommands;


use App\PatternsExamples\_behavioral\Command\CommandAbstract;

class PaymentCommand extends CommandAbstract
{

    public function execute()
    {
        // TODO: Implement execute() method.
        $this->manager->manage();
    }

}
