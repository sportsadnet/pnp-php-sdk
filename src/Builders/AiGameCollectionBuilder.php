<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\AiGame;

class AiGameCollectionBuilder extends CollectionBuilder
{
    /**
     * PicksCollectionBuilder constructor.
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, '/ai/games', AiGame::class);
    }
}
