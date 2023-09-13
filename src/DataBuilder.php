<?php

namespace Pnp\Sdk;

use Pnp\Sdk\Cache\CacheableBuilder;
use Pnp\Sdk\Cache\CacheableResourceBuilder;
use Pnp\Sdk\Http\Request;
use Pnp\Sdk\Promises\PromisedResource;
use Pnp\Sdk\Resource as ApiResource;

class DataBuilder extends Builder
{
    /**
     * {@inheritDoc}
     */
    public function cache(?int $lifetime = CacheableBuilder::DEFAULT_LIFETIME, ?string $key = null): CacheableResourceBuilder
    {
        return (new CacheableResourceBuilder($this->getCacheDriver(), $this))
            ->withLifetime($lifetime)
            ->withKey($key);
    }

    /**
     * Build the request for retrieving (getting) the resource.
     *
     * @return Request
     */
    public function buildGetRequest(): Request
    {
        return $this->buildBaseRequest('GET');
    }

    /**
     * Send the request to get the resource.
     *
     * @return ApiResource|null
     */
    public function get(): ?ApiResource
    {
        return $this->getAsync()->get();
    }

    /**
     * Send the get request asynchronously.
     *
     * @return PromisedResource
     */
    public function getAsync(): PromisedResource
    {
        return new PromisedResource(
            $this->sendRequest($this->buildGetRequest()),
            $this->resourceClass
        );
    }


    // These overrides help IDE-s to auto complete better.

    /**
     * {@inheritDoc}
     */
    public function auth(string $token = null): self
    {
        return parent::auth($token);
    }

    /**
     * {@inheritDoc}
     */
    public function with(array $relations = []): self
    {
        return parent::with($relations);
    }

    /**
     * {@inheritDoc}
     */
    public function params(array $params = []): static
    {
        return parent::params($params);
    }
}
