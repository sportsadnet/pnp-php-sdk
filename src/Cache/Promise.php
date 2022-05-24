<?php

namespace Pnp\Sdk\Cache;

use Closure;
use Pnp\Sdk\Contracts\PromiseInterface;
use Pnp\Sdk\Http\Request;
use Pnp\Sdk\Http\Response;

abstract class Promise implements PromiseInterface
{
    /**
     * The cache key.
     *
     * @var string
     */
    protected string $cacheKey;

    /**
     * @param  CacheableBuilder  $cacheableBuilder
     * @param  Request  $request
     * @param  Closure  $sendAction
     * @return Promise
     */
    public static function make(CacheableBuilder $cacheableBuilder, Request $request, Closure $sendAction): Promise
    {
        $cache = $cacheableBuilder->getCache();

        if ($cacheableBuilder->getKey() !== null) {
            $key = (string) $cacheableBuilder->getKey();
        } else {
            $key = self::getChecksumKey($request);
        }

        if (! $cacheableBuilder->overridesPreviousCache() && $cache->has($key)) {
            return new CachedPromise($key, $cache->get($key));
        }

        return new RealtimePromise($cacheableBuilder, $sendAction($request), $key);
    }

    /**
     * Return the cache key for the response.
     *
     * @param  Request  $request
     * @return string
     */
    public static function getChecksumKey(Request $request): string
    {
        return 'request:'.RequestChecksum::make($request);
    }

    /**
     * CachedPromise constructor.
     *
     * @param  string  $cacheKey
     */
    protected function __construct(string $cacheKey)
    {
        $this->cacheKey = $cacheKey;
    }

    /**
     * {@inheritDoc}
     *
     * @return Response
     */
    abstract public function get(): Response;
}
