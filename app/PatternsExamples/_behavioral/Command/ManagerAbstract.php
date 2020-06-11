<?php


namespace App\PatternsExamples\_behavioral\Command;


abstract class ManagerAbstract implements ManagerInterface
{
    protected $parameters;
    protected $actionType;

    public function __construct($parameters, $actionType)
    {
        $this->parameters = $parameters;
        $this->actionType = $actionType;
    }

    abstract public function manage();

}
