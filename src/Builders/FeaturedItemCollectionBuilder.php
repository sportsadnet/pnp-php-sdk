<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\FeaturedItem;

class FeaturedItemCollectionBuilder extends CollectionBuilder
{
    /**
     * CapperCollectionBuilder constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'featured-items', FeaturedItem::class);
    }
}
