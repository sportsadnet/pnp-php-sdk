<?php

namespace Pnp\Sdk\Builders\Users\Ai;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Ai\Game;

class GameResourceBuilder extends ResourceBuilder
{
    /**
     * PickResourceBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     * @param  string  $id
     */
    public function __construct(UserResourceBuilder $builder, string $id)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/ai/games', $id, Game::class);
    }
}
