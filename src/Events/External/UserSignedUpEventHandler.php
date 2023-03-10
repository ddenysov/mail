<?php

namespace App\Events\External;

use Ddenysov\SymfonyBus\Event\EventHandlerInterface;

class UserSignedUpEventHandler implements EventHandlerInterface
{
    public function __invoke(UserSignedUp $event)
    {
        dump($event);
    }
}