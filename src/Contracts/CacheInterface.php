<?php

namespace Pnp\Sdk\Contracts;

interface CacheInterface
{
    /**
     * Return the value with the key.
     * NULL if the key is not present in the cache or expired.
     *
     * @param  string  $key
     * @return string|null
     */
    public function get(string $key): ?string;

    /**
     * Return true if there is a value with the key
     * in the cache and IS NOT expired.
     *
     * @param  string  $key
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * Add the value to the cache with the provided key.
     *
     * @param  string  $key
     * @param  string  $value
     * @param  int|null  $lifetime  Cache lifetime in seconds. Null if it should never expire.
     */
    public function set(string $key, string $value, ?int $lifetime = null);
}
