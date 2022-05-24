<?php

namespace Pnp\Sdk\Cache;

use Pnp\Sdk\Contracts\PromiseInterface;
use Pnp\Sdk\Http\Response;

class RealtimePromise extends Promise
{
    /**
     * The cache.
     *
     * @var CacheableBuilder
     */
    protected CacheableBuilder $cacheableBuilder;

    /**
     * The base promise.
     *
     * @var PromiseInterface
     */
    private PromiseInterface $basePromise;

    /**
     * RealtimePromise constructor.
     *
     * @param  CacheableBuilder  $cacheableBuilder
     * @param  PromiseInterface  $promise
     * @param  string  $key
     */
    protected function __construct(CacheableBuilder $cacheableBuilder, PromiseInterface $promise, string $key)
    {
        parent::__construct($key);
        $this->cacheableBuilder = $cacheableBuilder;
        $this->basePromise = $promise;
    }

    /**
     * {@inheritDoc}
     *
     * @return Response
     */
    public function get(): Response
    {
        $cachedResponse = CachedResponse::fromResponse($this->basePromise->get());

        $this->cacheableBuilder->getCache()->set(
            $this->cacheKey, $cachedResponse->toJson(), $this->cacheableBuilder->getLifetime()
        );

        return $cachedResponse;
    }
}
