<?php


namespace App\PatternsExamples\_behavioral\Memento;


class ActionManager
{
    private $action;
    private $snapshots = [];

    public function __construct(Action $action)
    {
        $this->action = $action;
    }

    public function saveBackup()
    {
        $this->snapshots[] = $this->action->getSnapshot();
    }

    public function undoCommand()
    {
        if (!count($this->snapshots)) {
            return;
        }
        $snapshot = array_pop($this->snapshots);

        try {
            $this->action->restoreState($snapshot);
        } catch (\Exception $e) {
            $this->undoCommand();
        }
    }
}
