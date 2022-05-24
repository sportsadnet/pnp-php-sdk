<?php

namespace Pnp\Sdk\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use Pnp\Sdk\Builder;
use Pnp\Sdk\Contracts\ClientInterface;

class Client implements ClientInterface
{
    /**
     * The Guzzle HTTP client.
     *
     * @var GuzzleClient
     */
    private GuzzleClient $client;

    /**
     * Client constructor.
     *
     * @param  string  $baseUrl
     */
    public function __construct(string $baseUrl)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $baseUrl,
            'timeout' => 30,
        ]);
    }

    /**
     * {@inheritDoc}
     *
     * @param  Builder  $builder
     * @return Promise
     */
    public function sendAsync(Request $request): Promise
    {
        $options = [
            RequestOptions::HEADERS => $request->getHeaders(),
        ];

        if (! empty($request->getQuery())) {
            $options[RequestOptions::QUERY] = $request->getQuery();
        }

        if (! empty($request->getJson())) {
            $options[RequestOptions::JSON] = $request->getJson();
        }

        $guzzlePromise = $this->guzzleClient()->requestAsync($request->getMethod(), $request->getUri(), $options);

        return new Promise($guzzlePromise);
    }

    /**
     * Return the Guzzle client.
     *
     * @return GuzzleClient
     */
    public function guzzleClient(): GuzzleClient
    {
        return $this->client;
    }
}
