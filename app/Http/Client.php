<?php

namespace App\Http;

use Http\Client\HttpClient;
use Illuminate\Http\Client\Factory;
use Psr\Http\Message\RequestInterface;

class Client implements HttpClient
{
    protected $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }
    /**
     * Sends a PSR-7 request.
     *
     * @param  \Psr\Http\Message\RequestInterface  $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendRequest(RequestInterface $request)
    {
        return $this->factory->send($request->getMethod(), $request->getUri(), [
            'headers' => $request->getHeaders(),
        ])->toPsrResponse();
    }
}
