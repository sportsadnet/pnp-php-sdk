<?php

namespace Pnp\Sdk;

use Pnp\Sdk\Cache\CacheableBuilder;
use Pnp\Sdk\Contracts\CacheInterface;
use Pnp\Sdk\Contracts\PromiseInterface;
use Pnp\Sdk\Http\Request;
use RuntimeException;

abstract class Builder
{
    /**
     * The API main client (not the HTTP one).
     *
     * @var Client
     */
    private Client $client;

    /**
     * The token used for user authorization ("Authorization" header).
     *
     * @var string|null
     */
    protected ?string $userToken = null;

    /**
     * The full namespaced class of the model (resource) we're querying.
     *
     * @var string|null
     */
    protected ?string $resourceClass;

    /**
     * The target resource uri.
     *
     * @var string
     */
    protected string $resourceUri;

    /**
     * The requested relations.
     *
     * @var array
     */
    protected array $with = [];

    /**
     * @var array
     */
    protected array $params = [];

    /**
     * Builder constructor.
     *
     * @param  Client  $client
     * @param  string  $resourceUri
     * @param  string|null  $resourceClass
     */
    public function __construct(Client $client, string $resourceUri, ?string $resourceClass = null)
    {
        $this->client = $client;
        $this->resourceUri = $resourceUri;
        $this->resourceClass = $resourceClass;
    }

    /**
     * Return the API client of this builder.
     *
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Return the target uri.
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->resourceUri;
    }

    /**
     * Return the resource class.
     *
     * @return string|null
     */
    public function getResourceClass(): ?string
    {
        return $this->resourceClass;
    }

    /**
     * Set the authorization token.
     *
     * @param  string|null  $token
     * @return $this
     */
    protected function auth(string $token = null): self
    {
        $this->userToken = $token;
        return $this;
    }

    /**
     * Add relationships to load.
     *
     * @param  array|string[]  $relations
     * @return $this
     */
    protected function with(array $relations = []): self
    {
        $relations = array_map(function ($relation) {
            return Utility::strToSnake($relation);
        }, $relations);

        $this->with = array_merge($this->with, $relations);
        return $this;
    }

    /**
     * @param array $params
     * @return $this
     */
    protected function params(array $params = []): static
    {
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * Cache the response if it isn't cached,
     * and use the cached one if it is.
     *
     * @param  int|null  $lifetime
     * @param  string|null  $key
     * @return CacheableBuilder
     */
    abstract public function cache(?int $lifetime = CacheableBuilder::DEFAULT_LIFETIME, ?string $key = null): CacheableBuilder;

    /**
     * Build the base request with all base required headers and query values.
     *
     * @param  string  $method
     * @return Request
     */
    protected function buildBaseRequest(string $method): Request
    {
        $request = new Request($method, $this->getUri());

        if ($this->userToken !== null) {
            $request->setHeader("Authorization", "Bearer {$this->userToken}");
        }

        if (! empty($this->params)) {
            $request->mergeQuery($this->params);
        }

        if (! empty($this->with)) {
            $request->addQuery('with', implode(',', $this->with));
        }

        return $request;
    }

    /**
     * Send the request to the API server.
     *
     * @param  Request  $request
     * @return PromiseInterface
     */
    protected function sendRequest(Request $request): PromiseInterface
    {
        return $this->getClient()->sendAsync($request);
    }

    /**
     * Get the cache driver or throw an exception if it's missing.
     *
     * @return CacheInterface
     */
    protected function getCacheDriver(): CacheInterface
    {
        $client = $this->getClient()->getCache();

        if ($client !== null) {
            return $client;
        }

        throw new RuntimeException(
            "The API client does not support caching. ".
            "You need to implement the ".CacheInterface::class." interface ".
            "and pass it in the client constructor."
        );
    }
}
