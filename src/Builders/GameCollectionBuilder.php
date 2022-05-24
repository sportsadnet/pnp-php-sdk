<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Game;

class GameCollectionBuilder extends CollectionBuilder
{
    /**
     * GameCollectionBuilder constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'games', Game::class);
    }
}
