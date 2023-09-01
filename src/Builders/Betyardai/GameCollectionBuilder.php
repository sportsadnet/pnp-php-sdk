<?php

namespace Pnp\Sdk\Builders\Betyardai;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Betyardai\Game;

class GameCollectionBuilder extends CollectionBuilder
{
    /**
     * PicksCollectionBuilder constructor.
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'games', Game::class);
    }
}
