<?php

namespace Pnp\Sdk\Builders\Betyardai;

use Pnp\Sdk\Builders\BetyardaiBuilder;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Betyardai\Game;

class GameResourceBuilder extends ResourceBuilder
{
    /**
     * PickResourceBuilder constructor.
     */
    public function __construct(BetyardaiBuilder $builder, string $id)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/games', $id, Game::class);
    }
}
