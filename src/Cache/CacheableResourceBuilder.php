<?php

namespace Pnp\Sdk\Cache;

use Pnp\Sdk\Promises\PromisedResource;
use Pnp\Sdk\Resource;

class CacheableResourceBuilder extends CacheableBuilder
{
    /**
     * Send the get request asynchronously.
     *
     * @return PromisedResource
     */
    public function getAsync(): PromisedResource
    {
        return new PromisedResource(
            $this->sendRequest($this->builder->buildGetRequest()),
            $this->builder->getResourceClass()
        );
    }

    /**
     * Send the request to get the resource.
     *
     * @return Resource|null
     */
    public function get(): ?Resource
    {
        return $this->getAsync()->get();
    }
}
