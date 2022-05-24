<?php

namespace Pnp\Sdk\Builders\Users;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\PurchasedPick;

class PickResourceBuilder extends ResourceBuilder
{
    /**
     * PickResourceBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     * @param  string  $id
     */
    public function __construct(UserResourceBuilder $builder, string $id)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/picks', $id, PurchasedPick::class);
    }
}
