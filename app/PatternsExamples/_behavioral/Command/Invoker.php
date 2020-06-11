<?php


namespace App\PatternsExamples\_behavioral\Command;


use App\PatternsExamples\_behavioral\Command\ConcreteCommands\ShowCurrencies;
use App\PatternsExamples\_behavioral\Command\ConcreteCommands\ShowPayments;
use App\PatternsExamples\_behavioral\Command\ConcreteCommands\CurrencyCommand;
use App\PatternsExamples\_behavioral\Command\ConcreteCommands\PaymentCommand;
use App\PatternsExamples\_behavioral\Command\Managers\FirstCurrencyManager;
use App\PatternsExamples\_behavioral\Command\Managers\FirstPaymentManager;
use App\PatternsExamples\_behavioral\Command\Managers\SecondCurrencyManager;
use App\PatternsExamples\_behavioral\Command\Managers\SecondPaymentManager;

class Invoker
{
    const ACTION_TYPE_SELL = 'SELL',
        ACTION_TYPE_BUY = 'BUY',
        ACTION_TYPE_WITHDRAW = 'WDR',
        ACTION_TYPE_DEPOSIT = 'DEP';

    const COMMAND_TYPE_FIRST_PAYMENT = 'FST-PAY',
        COMMAND_TYPE_FIRST_CURRENCY = 'FST-CUR',
        COMMAND_TYPE_SECOND_PAYMENT = 'SEC-PAY',
        COMMAND_TYPE_SECOND_CURRENCY = 'SEC-CUR';

    private $request;
    private $command;

    public function __construct($request)
    {
        $this->request = $request;
        $parameters = $request->getParameters();
        $commandType = $request->getCommandType();
        $actionType = $request->getActionType();

        switch ($commandType) {
            case self::COMMAND_TYPE_FIRST_PAYMENT:
                $manager = new FirstPaymentManager($parameters, $actionType);
                $this->command = new PaymentCommand($manager);
                break;
            case self::COMMAND_TYPE_FIRST_CURRENCY:
                $manager = new FirstCurrencyManager($parameters, $actionType);
                $this->command = new CurrencyCommand($manager);
                break;
            case self::COMMAND_TYPE_SECOND_PAYMENT:
                $manager = new SecondPaymentManager($parameters, $actionType);
                $this->command = new PaymentCommand($manager);
                break;
            case self::COMMAND_TYPE_SECOND_CURRENCY:
                $manager = new SecondCurrencyManager($parameters, $actionType);
                $this->command = new CurrencyCommand($manager);
                break;
        }
    }

    public function executeCommand()
    {
        $this->command->execute();
    }
}
