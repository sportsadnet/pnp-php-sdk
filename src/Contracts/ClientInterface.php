<?php

namespace Pnp\Sdk\Contracts;

use Pnp\Sdk\Http\Request;

interface ClientInterface
{
    // TODO: Probably add setter to set up the base URL.

    /**
     * Send an asynchronous HTTP request.
     *
     * @param  Request  $request
     * @return PromiseInterface
     */
    public function sendAsync(Request $request): PromiseInterface;
}
