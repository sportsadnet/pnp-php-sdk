<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Session;

class SessionCollectionBuilder extends CollectionBuilder
{
    /**
     * SessionCollectionController constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'sessions', Session::class);
    }
}
