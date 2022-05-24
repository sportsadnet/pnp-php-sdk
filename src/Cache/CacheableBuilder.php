<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Cache;

use Pnp\Sdk\Builder;
use Pnp\Sdk\Contracts\CacheInterface;
use Pnp\Sdk\Contracts\PromiseInterface;
use Pnp\Sdk\Http\Request;

abstract class CacheableBuilder
{
    /**
     * The default cache lifetime.
     */
    public const DEFAULT_LIFETIME = 60;

    /**
     * The cache driver.
     *
     * @var CacheInterface
     */
    private CacheInterface $cache;

    /**
     * The parent builder.
     *
     * @var Builder
     */
    protected Builder $builder;

    /**
     * The cache key.
     *
     * @var string|null
     */
    private ?string $key = null;

    /**
     * The lifetime of the cached value in seconds.
     *
     * @var int|null
     */
    private ?int $lifetime = null;

    /**
     * Whether to override the old cache if present.
     *
     * @var bool
     */
    private bool $override = false;

    /**
     * CacheableBuilder constructor.
     *
     * @param  CacheInterface  $cache
     * @param  Builder  $builder
     */
    public function __construct(CacheInterface $cache, Builder $builder)
    {
        $this->cache = $cache;
        $this->builder = $builder;
    }

    /**
     * Return the cache lifetime.
     *
     * @return int|null
     */
    public function getLifetime(): ?int
    {
        return $this->lifetime;
    }

    /**
     * Return the custom cache key.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * True if the builder will override the previous cache.
     *
     * @return bool
     */
    public function overridesPreviousCache(): bool
    {
        return $this->override;
    }

    /**
     * Return the cache driver.
     *
     * @return CacheInterface
     */
    public function getCache(): CacheInterface
    {
        return $this->cache;
    }

    /**
     * Set the lifetime of the cached value in seconds.
     *
     * @param  int|null  $seconds
     * @return $this
     */
    public function withLifetime(?int $seconds): self
    {
        $this->lifetime = $seconds;
        return $this;
    }

    /**
     * Set the key of the cached value.
     *
     * @param  string|null  $key
     * @return $this
     */
    public function withKey(?string $key): self
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Cache the response forever.
     *
     * @return $this
     */
    public function forever(): self
    {
        return $this->withLifetime(null);
    }

    /**
     * Don't use the old cache and override it.
     *
     * @param  bool  $yes
     * @return $this
     */
    public function override(bool $yes = true): self
    {
        $this->override = $yes;
        return $this;
    }

    /**
     * Use the old cache if present.
     *
     * @return $this
     */
    public function usePrevious(): self
    {
        return $this->override(false);
    }

    /**
     * Send the request to the API server.
     *
     * @param  Request  $request
     * @return PromiseInterface
     */
    protected function sendRequest(Request $request): PromiseInterface
    {
        return Promise::make($this, $request, function ($request) {
            return $this->builder->getClient()->sendAsync($request);
        });
    }

    /**
     * Return the underlying builder.
     *
     * @return Builder
     */
    public function getBuilder(): Builder
    {
        return $this->builder;
    }
}
