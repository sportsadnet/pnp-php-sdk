<?php

namespace Pnp\Sdk\Builders\Betyardai;

use Pnp\Sdk\Client;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Betyardai\Game;

class GameResourceBuilder extends ResourceBuilder
{
    /**
     * PickResourceBuilder constructor.
     */
    public function __construct(Client $client, string $id)
    {
        parent::__construct($client, 'games', $id, Game::class);
    }
}
