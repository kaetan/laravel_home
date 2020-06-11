<?php


namespace App\PatternsExamples\_behavioral\Observer;


class Subscriber implements SubscriberInterface
{
    public function getSubsForObserver(Observer $observer)
    {
        return $this->where('observer_id', '=', $observer->getId())->get();
    }
}
