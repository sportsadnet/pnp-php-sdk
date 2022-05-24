<?php

namespace Pnp\Sdk\Promises;

use Pnp\Sdk\Exceptions\NotFoundException;
use Pnp\Sdk\Resource as ApiResource;

class PromisedResource extends AbstractPromise
{
    /**
     * Wait for the request to complete and get the returned resource.
     *
     * @return ApiResource|null
     */
    public function get(): ?ApiResource
    {
        $response = $this->promise->get();

        try {
            $response->throwExceptionsIfAny();
        } catch (NotFoundException $exception) {
            return null;
        }

        $json = json_decode($response->body(), true);

        if (empty($json)) {
            return null;
        }

        return ApiResource::parseFromJson($json, $this->resourceClass);
    }
}
