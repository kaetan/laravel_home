<?php


namespace App\PatternsExamples\_behavioral\Observer;


class Observer
{
    public function getId()
    {
        return $this->id;
    }

    public function addSubscriber(Subscriber $sub)
    {
        // sub the new user
        return 'Subscribed!';
    }

    public function removeSubscriber(Subscriber $sub)
    {
        // unsub the user
        return 'Removed!';
    }

    public function notify()
    {
        $subModel = new Subscriber();
        $subscribers = $subModel->getSubsForObserver($this);

        foreach ($subscribers as $subscriber) {
            $notification = 'Hi there!';
            // notify all subs
        }
    }
}
