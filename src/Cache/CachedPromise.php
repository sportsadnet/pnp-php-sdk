<?php

namespace Pnp\Sdk\Cache;

use Pnp\Sdk\Http\Response;

class CachedPromise extends Promise
{
    /**
     * The cached string.
     *
     * @var string|null
     */
    private ?string $cachedString;

    /**
     * CachedPromise constructor.
     *
     * @param  string  $key
     * @param  string  $value
     */
    protected function __construct(string $key, string $value)
    {
        parent::__construct($key);
        $this->cachedString = $value;
    }

    /**
     * {@inheritDoc}
     *
     * @return Response
     */
    public function get(): Response
    {
        return CachedResponse::fromJson($this->cachedString);
    }
}
