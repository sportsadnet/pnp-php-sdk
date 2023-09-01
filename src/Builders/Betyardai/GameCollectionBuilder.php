<?php

namespace Pnp\Sdk\Builders\Betyardai;

use Pnp\Sdk\Builders\BetyardaiBuilder;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Betyardai\Game;

class GameCollectionBuilder extends CollectionBuilder
{
    /**
     * PicksCollectionBuilder constructor.
     */
    public function __construct(BetyardaiBuilder $builder)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/games', Game::class);
    }
}
