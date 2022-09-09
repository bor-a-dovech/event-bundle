<?php

namespace Pantheon\EventBundle\Service;

class SendService
{
    const URL = 'https://sms.dev.cgu.iac.mchs.ru/api/receive';

    private HttpService $httpService;
    private string $url;

    public function __construct(
        HttpService $httpService
    )
    {
        $this->httpService = $httpService;
        $this->url = $_ENV[''] ?? self::URL;
    }

    public function post(array $data) : bool
    {
        $this->httpService->post($this->url, $data);
        return true;
    }

}