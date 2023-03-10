<?php

namespace App\Controller;

use App\Query\GetUserQuery;
use App\Repository\UserRepository;
use Ddenysov\SymfonyBus\Query\QueryBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class GetUserController extends AbstractController
{
    use HandleTrait;

    #[Route('/', name: 'mailer')]
    public function index(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);

        return new Response();
    }
}