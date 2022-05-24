<?php

namespace Pnp\Sdk\Cache;

use Pnp\Sdk\Contracts\CacheInterface;

class ArrayCache implements CacheInterface
{
    /**
     * The cached values.
     *
     * @var array
     */
    public array $cache = [];

    /**
     * {@inheritDoc}
     */
    public function get(string $key): ?string
    {
        return $this->cache[$key] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->cache);
    }

    /**
     * {@inheritDoc}
     */
    public function set(string $key, string $value, ?int $lifetime = null)
    {
        $this->cache[$key] = $value;
    }
}
