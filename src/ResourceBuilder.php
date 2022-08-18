<?php

namespace Pnp\Sdk;

use Pnp\Sdk\Cache\CacheableBuilder;
use Pnp\Sdk\Cache\CacheableResourceBuilder;
use Pnp\Sdk\Http\Request;
use Pnp\Sdk\Promises\PromisedResource;
use Pnp\Sdk\Resource as ApiResource;

class ResourceBuilder extends Builder
{
    /**
     * The id of the resource.
     *
     * @var string
     */
    private string $id;

    /**
     * ResourceBuilder constructor.
     *
     * @param  Client  $client
     * @param  string  $resourceUri
     * @param  string  $id
     * @param  string|null  $resourceClass
     */
    public function __construct(Client $client, string $resourceUri, string $id, ?string $resourceClass = null)
    {
        parent::__construct($client, trim($resourceUri, '/').'/'.$id, $resourceClass);
        $this->id = $id;
    }

    /**
     * Return the id of the resource.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

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
     * Build the request for updating the resource.
     *
     * @param  array  $attributes
     * @return Request
     */
    public function buildUpdateRequest(array $attributes = []): Request
    {
        return $this->buildBaseRequest('PATCH')->setJson($attributes);
    }

    /**
     * Build the request for deleting the resource.
     *
     * @return Request
     */
    public function buildDeleteRequest(): Request
    {
        return $this->buildBaseRequest('DELETE');
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

    /**
     * Update the resource with the provided attributes.
     *
     * @param  array  $attributes
     * @return ApiResource|null
     */
    public function update(array $attributes = []): ?ApiResource
    {
        return $this->updateAsync($attributes)->get();
    }

    /**
     * Update the resource asynchronously.
     *
     * @param  array  $attributes
     * @return PromisedResource
     */
    public function updateAsync(array $attributes = []): PromisedResource
    {
        return new PromisedResource(
            $this->sendRequest($this->buildUpdateRequest($attributes)),
            $this->resourceClass
        );
    }

    /**
     * Delete the resource.
     *
     * @return ApiResource|null
     */
    public function delete(): ?ApiResource
    {
        return $this->deleteAsync()->get();
    }

    /**
     * Delete the resource asynchronously.
     *
     * @return PromisedResource
     */
    public function deleteAsync(): PromisedResource
    {
        return new PromisedResource(
            $this->sendRequest($this->buildDeleteRequest()),
            $this->resourceClass
        );
    }

    // --------------------------------------------------------------------------

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
