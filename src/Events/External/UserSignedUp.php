<?php

namespace App\Events\External;

use Ddenysov\SymfonyBus\Event\Event;
use Symfony\Component\Uid\Ulid;

class UserSignedUp implements Event
{
    /**
     * @param Ulid $id
     */
    public function __construct(private readonly Ulid $id)
    {
    }

    /**
     * @return Ulid
     */
    public function getId(): Ulid
    {
        return $this->id;
    }
}