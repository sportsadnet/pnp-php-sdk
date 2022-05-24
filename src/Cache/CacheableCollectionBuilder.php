<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Cache;

use Pnp\Sdk\Paginator;
use Pnp\Sdk\Promises\PromisedCollection;
use Pnp\Sdk\Resource;

class CacheableCollectionBuilder extends CacheableBuilder
{
    /**
     * Send the request asynchronously.
     *
     * @return PromisedCollection
     */
    public function getAsync(): PromisedCollection
    {
        return new PromisedCollection(
            $this->sendRequest($this->builder->buildGetRequest()),
            $this->builder->getResourceClass()
        );
    }

    /**
     * Return the results as collection.
     *
     * @return array
     */
    public function get(): array
    {
        return $this->getAsync()->get();
    }

    /**
     * Return the results paginated.
     *
     * @return Paginator
     */
    public function paginate(): Paginator
    {
        return $this->getAsync()->paginate();
    }

    /**
     * Return the first resource of the result.
     *
     * @return Resource|null
     */
    public function first(): ?Resource
    {
        return $this->get()[0] ?? null;
    }
}
