<?php

namespace Pantheon\EventBundle\Messenger;

use Pantheon\EventBundle\Manager\SendManager;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class AuditMiddleware implements MiddlewareInterface
{
    private SendManager $sendManager;

    public function __construct(
        SendManager $sendManager
    )
    {
        $this->sendManager = $sendManager;
    }

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $message = $envelope->getMessage();
        $this->sendManager->send($message);
        return $stack->next()->handle($envelope, $stack);
    }
}