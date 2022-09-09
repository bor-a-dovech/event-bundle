<?php

namespace Pantheon\EventBundle\Service;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;

/**
 * Класс, который обращается к сервису учета событий посредством HTTP-запросов.
 *
 * Class HttpService
 * @package App\Services
 */
class HttpService
{
    /** @var ClientInterface */
    private $client;

    /** @var string[] */
    private $headers;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function post(string $url, array $post)
    {
        $result = null;
        $time = null;
        try {
            $response = $this->client->request(
                'POST',
                $url,
                [
                    'form_params' => $post,
                ]

            );
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }
        $contents = $response->getBody()->getContents();
        $code = $response->getStatusCode();
        $time = round($time, 2);
    }
}