<?php

namespace AppBundle\Util;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ShortUrl
 * @package AppBundle\Util
 */
class ShortUrl
{
    const API_KEY = 'AIzaSyBop2D6OjWQ2uAhsxkpuapdBir4NOzvLfw';

    private $client;

    /**
     * ShortUrl constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $longUrl
     * @return string
     * @throws \RuntimeException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($longUrl)
    {
        /**
         * @var $response ResponseInterface
         */
        $response = $this->client->request('POST', 'https://www.googleapis.com/urlshortener/v1/url', [
            'query' => [
                'key' => self::API_KEY,
            ],
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode([
                'longUrl' => $longUrl,
            ]),
        ]);

        if (200 === $response->getStatusCode()) {
            return json_decode($response->getBody()->getContents(), true)['id'];
        }

        throw new \RuntimeException();
    }
}
