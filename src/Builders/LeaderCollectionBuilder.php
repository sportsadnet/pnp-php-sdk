<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Leader;

class LeaderCollectionBuilder extends CollectionBuilder
{
    /**
     * LeaderCollectionBuilder constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'leaders', Leader::class);
    }
}
