<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\User;

class UserCollectionBuilder extends CollectionBuilder
{
    /**
     * UserCollectionBuilder constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'users', User::class);
    }
}
