<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Subscription;

class SubscriptionCollectionBuilder extends CollectionBuilder
{
    /**
     * SubscriptionCollectionBuilder constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'subscriptions', Subscription::class);
    }
}
