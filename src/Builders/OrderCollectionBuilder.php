<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Order;

class OrderCollectionBuilder extends CollectionBuilder
{
    /**
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'orders', Order::class);
    }
}
