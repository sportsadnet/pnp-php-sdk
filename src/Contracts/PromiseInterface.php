<?php

namespace Pnp\Sdk\Contracts;

use Pnp\Sdk\Exceptions\RequestException;
use Pnp\Sdk\Http\Response;

interface PromiseInterface
{
    /**
     * Wait for the request to complete and return
     * the result in a compatible response object.
     *
     * @return Response
     * @throws RequestException
     */
    public function get(): Response;
}
