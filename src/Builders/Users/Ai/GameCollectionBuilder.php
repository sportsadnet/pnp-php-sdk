<?php

namespace Pnp\Sdk\Builders\Users\Ai;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Ai\Game;

class GameCollectionBuilder extends CollectionBuilder
{
    /**
     * PicksCollectionBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     */
    public function __construct(UserResourceBuilder $builder)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/ai/games', Game::class);
    }
}
