<?php


namespace App\PatternsExamples\_behavioral\Memento;


class ActionSnapshot implements ActionSnapshotInterface
{
    private $state;

    public function __construct(ActionState $state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
}
