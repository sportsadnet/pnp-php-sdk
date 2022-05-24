<?php

namespace Pnp\Sdk\Promises;

use Pnp\Sdk\Paginator;
use Pnp\Sdk\Resource;
use Pnp\Sdk\Resource as ApiResource;

class PromisedCollection extends AbstractPromise
{
    /**
     * Wait for the request to complete and get the results.
     *
     * @return array|Resource[]
     */
    public function get(): array
    {
        return $this->paginate()->items();
    }

    /**
     * Return the first resource of the result.
     *
     * @return ApiResource|null
     */
    public function first(): ?ApiResource
    {
        return $this->get()[0] ?? null;
    }

    /**
     * Wait for the request to complete and get the results paginated.
     *
     * @return Paginator
     */
    public function paginate(): Paginator
    {
        $response = $this->promise->get();

        $response->throwExceptionsIfAny();

        $json = json_decode($response->body(), true);
        return Paginator::parseFromJson($json, $this->resourceClass);
    }
}
