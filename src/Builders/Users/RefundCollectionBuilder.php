<?php

namespace Pnp\Sdk\Builders\Users;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\Refund;

class RefundCollectionBuilder extends CollectionBuilder
{
    /**
     * RefundResourceBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     */
    public function __construct(UserResourceBuilder $builder)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/refunds', Refund::class);
    }
}
