<?php

namespace Pantheon\EventBundle\Messenger;

use Pantheon\UserBundle\Message\EmailNotification;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class AuditMiddleware implements MiddlewareInterface
{
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $message = $envelope->getMessage(); // месадж может быть любого класса анть
        return $stack->next()->handle($envelope, $stack);
    }
}