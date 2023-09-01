<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\DataBuilder;

class BetyardaiBuilder extends DataBuilder
{
    /**
     * PicksCollectionBuilder constructor.
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'betyardai');
    }

    /**
     * /betyardai/games
     */
    public function games(): \Pnp\Sdk\Builders\Betyardai\GameCollectionBuilder
    {
        return new \Pnp\Sdk\Builders\Betyardai\GameCollectionBuilder($this->getClient());
    }

    /**
     * /betyardai/games/{id}
     */
    public function game(string $id): \Pnp\Sdk\Builders\Betyardai\GameResourceBuilder
    {
        return new \Pnp\Sdk\Builders\Betyardai\GameResourceBuilder($this->getClient(), $id);
    }

    /**
     * /betyardai/ppv-top
     */
    public function ppvTop(): \Pnp\Sdk\Builders\Betyardai\PpvTopResourceBuilder
    {
        return new \Pnp\Sdk\Builders\Betyardai\PpvTopResourceBuilder($this->getClient());
    }
}
