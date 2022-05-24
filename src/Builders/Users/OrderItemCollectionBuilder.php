<?php

namespace Pnp\Sdk\Builders\Users;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\OrderItem;

class OrderItemCollectionBuilder extends CollectionBuilder
{
    /**
     * OrderItemCollectionBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     */
    public function __construct(UserResourceBuilder $builder)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/order-items', OrderItem::class);
    }
}
