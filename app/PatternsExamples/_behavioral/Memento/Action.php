<?php


namespace App\PatternsExamples\_behavioral\Memento;


class Action
{
    /**
     * @var ActionState $state
     */
    private $state;

    public function getSnapshot(): ActionSnapshotInterface
    {
        return new ActionSnapshot($this->state);
    }

    public function restoreState(ActionSnapshotInterface $actionSnapshot)
    {
        $this->state = $actionSnapshot->getState();
    }
}
