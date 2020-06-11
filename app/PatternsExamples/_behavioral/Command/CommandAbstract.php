<?php


namespace App\PatternsExamples\_behavioral\Command;


abstract class CommandAbstract implements CommandInterface
{
    protected $manager;

    public function __construct(ManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    abstract public function execute();

}
