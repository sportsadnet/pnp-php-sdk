<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Country;

class CountryCollectionBuilder extends CollectionBuilder
{
    /**
     * CountryCollectionBuilder constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'countries', Country::class);
    }
}
