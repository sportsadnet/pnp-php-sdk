<?php

namespace Pnp\Sdk\Http;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface as GuzzlePromiseInterface;
use Pnp\Sdk\Contracts\PromiseInterface;
use Pnp\Sdk\Exceptions\HttpClientException;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class Promise implements PromiseInterface
{
    /**
     * The Guzzle promise.
     *
     * @var GuzzlePromiseInterface
     */
    private GuzzlePromiseInterface $promise;

    /**
     * Promise constructor.
     *
     * @param  GuzzlePromiseInterface  $promise
     */
    public function __construct(GuzzlePromiseInterface $promise)
    {
        $this->promise = $promise;
    }

    /**
     * {@inheritDoc}
     *
     * @return Response
     */
    public function get(): Response
    {
        /** @var ResponseInterface $guzzleResponse */

        $this->promise->then(function (ResponseInterface $response) use (&$guzzleResponse) {
            $guzzleResponse = $response;
        })->otherwise(function ($exception) use (&$guzzleResponse) {
            /** @var RuntimeException $exception */

            $guzzleResponse = null;
            if ($exception instanceof RequestException) {
                $guzzleResponse = $exception->getResponse();
            }

            if ($guzzleResponse === null) {
                throw new HttpClientException($exception->getMessage(), $exception->getCode(), $exception);
            }

        })->wait();

        return new Response(
            $guzzleResponse->getHeaders(),
            (string) $guzzleResponse->getBody(),
            (int) $guzzleResponse->getStatusCode(),
        );
    }
}
