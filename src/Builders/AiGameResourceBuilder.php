<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\AiGame;

class AiGameResourceBuilder extends ResourceBuilder
{
    /**
     * PickResourceBuilder constructor.
     */
    public function __construct(Client $client, string $id)
    {
        parent::__construct($client, '/ai/games', $id, AiGame::class);
    }
}
