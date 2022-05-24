<?php

namespace Pnp\Sdk;

use Closure;
use Pnp\Sdk\Contracts\CacheInterface;
use Pnp\Sdk\Contracts\ClientInterface;
use Pnp\Sdk\Contracts\PromiseInterface;
use Pnp\Sdk\Http\Client as HttpClient;
use Pnp\Sdk\Http\Request;

class Client
{
    use HasRequests;

    /**
     * The base URL of the API.
     *
     * @var string
     */
    private string $apiBaseUrl;

    /**
     * The site secret ("X-Site-Secret" header).
     *
     * @var string
     */
    private string $siteSecret;

    /**
     * The client used to send HTTP requests.
     *
     * @var ClientInterface
     */
    private ClientInterface $httpClient;

    /**
     * The cache driver used to cache responses.
     *
     * @var CacheInterface|null
     */
    private ?CacheInterface $cache;

    /**
     * Action to call before sending a request.
     *
     * @var Closure|null
     */
    private ?Closure $beforeRequest = null;

    /**
     * Client constructor.
     *
     * @param  string  $apiBaseUrl  The base API url. It should look something like "https://api.picksandparlays.net/v1/".
     * @param  string  $siteSecret
     * @param  ClientInterface|null  $httpClient
     * @param  CacheInterface|null  $cache
     */
    public function __construct(
        string $apiBaseUrl,
        string $siteSecret,
        CacheInterface $cache = null,
        ClientInterface $httpClient = null
    ) {
        // Make sure the base URL always ends with "/".
        $this->apiBaseUrl = trim($apiBaseUrl, '/').'/';

        $this->siteSecret = $siteSecret;

        if (is_null($httpClient)) {
            $httpClient = new HttpClient($this->apiBaseUrl);
        }

        $this->setHttpClient($httpClient);
        $this->setCache($cache);

        // This is the HasRequests trait client.
        $this->setClient($this);
    }

    /**
     * Return the HTTP client.
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Set the HTTP client to use for sending requests.
     *
     * @param  ClientInterface  $client
     * @return $this
     */
    public function setHttpClient(ClientInterface $client): self
    {
        $this->httpClient = $client;
        return $this;
    }

    /**
     * Return the cache driver if there is any.
     *
     * @return CacheInterface|null
     */
    public function getCache(): ?CacheInterface
    {
        return $this->cache;
    }

    /**
     * Set the cache driver.
     *
     * @param  CacheInterface|null  $cache
     * @return $this
     */
    public function setCache(?CacheInterface $cache): self
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * Action to call before sending a request.
     *
     * @param  Closure|null  $action
     * @return Client
     */
    public function beforeRequest(?Closure $action): Client
    {
        $this->beforeRequest = $action;
        return $this;
    }

    /**
     * Send a request asynchronously.
     *
     * @param  Request  $request
     * @return PromiseInterface
     */
    public function sendAsync(Request $request): PromiseInterface
    {
        $request->setHeader('X-Site-Secret', $this->siteSecret);

        if ($this->beforeRequest !== null) {
            call_user_func($this->beforeRequest, $request);
        }

        return $this->getHttpClient()->sendAsync($request);
    }
}
