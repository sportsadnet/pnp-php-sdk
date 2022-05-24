<?php

namespace Pnp\Sdk\Promises;

use Pnp\Sdk\Contracts\PromiseInterface;

abstract class AbstractPromise
{
    /**
     * The http promise.
     *
     * @var PromiseInterface
     */
    protected PromiseInterface $promise;

    /**
     * The resource class used to convert the returned data to objects.
     *
     * @var string|null
     */
    protected ?string $resourceClass;

    /**
     * PromisedCollection constructor.
     *
     * @param  PromiseInterface  $promise
     * @param  string|null  $resourceClass
     */
    public function __construct(PromiseInterface $promise, string $resourceClass = null)
    {
        $this->promise = $promise;
        $this->resourceClass = $resourceClass;
    }
}
