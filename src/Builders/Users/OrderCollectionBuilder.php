<?php

namespace Pnp\Sdk\Builders\Users;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Order;

class OrderCollectionBuilder extends CollectionBuilder
{
    /**
     * OrderCollectionBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     */
    public function __construct(UserResourceBuilder $builder)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/orders', Order::class);
    }
}
