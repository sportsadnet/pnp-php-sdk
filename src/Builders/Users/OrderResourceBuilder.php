<?php

namespace Pnp\Sdk\Builders\Users;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Order;

class OrderResourceBuilder extends ResourceBuilder
{
    /**
     * OrderResourceBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     * @param  string  $id
     */
    public function __construct(UserResourceBuilder $builder, string $id)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/orders', $id, Order::class);
    }
}
