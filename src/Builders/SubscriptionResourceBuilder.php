<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Subscription;

class SubscriptionResourceBuilder extends ResourceBuilder
{
    /**
     * SubscriptionResourceBuilder constructor.
     *
     * @param  Client  $client
     * @param  string  $id
     */
    public function __construct(Client $client, string $id)
    {
        parent::__construct($client, 'subscriptions', $id, Subscription::class);
    }
}
