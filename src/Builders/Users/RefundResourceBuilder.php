<?php

namespace Pnp\Sdk\Builders\Users;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Refund;

class RefundResourceBuilder extends ResourceBuilder
{
    /**
     * RefundResourceBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     * @param  string  $id
     */
    public function __construct(UserResourceBuilder $builder, string $id)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/refunds', $id, Refund::class);
    }
}
