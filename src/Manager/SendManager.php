<?php

namespace Pantheon\EventBundle\Manager;

use Pantheon\EventBundle\Service\SendService;
use Pantheon\UserBundle\Message\UserNotification;

class SendManager
{
    private SendService $sendService;

    public function __construct(
        SendService $sendService
    )
    {
        $this->sendService = $sendService;
    }

    // TODO: мэппинг полей
    public function send($message)
    {
        /** @var UserNotification $text */
        $text = $message->getMessage();
        $context = $message->getContext();
        $post = [
            'project' => 'szed_server',
            'level' => 'normal',
            'userId' => $message->getAuthorId(),
            'userName' => $message->getAuthorName(),
            'text' => $text,
            'event_datetime' => (($dateTime = $message->getDateTime())
                ? $dateTime->format('Y-m-d H:i:s')
                : (new \DateTime())->format('Y-m-d H:i:s')
            ),
            'data' => ((is_array($context))
                ? json_encode($context)
                : $context
            ),
        ];
        $this->sendService->post($post);
    }

}