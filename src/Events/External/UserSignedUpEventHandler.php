<?php

namespace App\Events\External;

use Ddenysov\SymfonyBus\Event\EventHandlerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class UserSignedUpEventHandler implements EventHandlerInterface
{
    public function __construct(private readonly MailerInterface $mailer)
    {

    }

    public function __invoke(UserSignedUp $event)
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html("<p>See Twig integration for better HTML integration! user: {$event->getId()}</p>");

        $this->mailer->send($email);
    }
}