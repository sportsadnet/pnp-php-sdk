<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Capper;

class CapperResourceBuilder extends ResourceBuilder
{
    /**
     * CapperResourceBuilder constructor.
     *
     * @param  Client  $client
     * @param  string  $id
     */
    public function __construct(Client $client, string $id)
    {
        parent::__construct($client, 'cappers', $id, Capper::class);
    }
}
