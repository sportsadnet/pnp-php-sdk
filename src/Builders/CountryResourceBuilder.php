<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Country;

class CountryResourceBuilder extends ResourceBuilder
{
    /**
     * CountryResourceBuilder constructor.
     *
     * @param  Client  $client
     * @param  string  $id
     */
    public function __construct(Client $client, string $id)
    {
        parent::__construct($client, 'countries', $id, Country::class);
    }
}
