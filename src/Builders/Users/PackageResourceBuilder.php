<?php

namespace Pnp\Sdk\Builders\Users;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\PurchasedPackage;

class PackageResourceBuilder extends ResourceBuilder
{
    /**
     * PackageResourceBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     * @param  string  $id
     */
    public function __construct(UserResourceBuilder $builder, string $id)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/packages', $id, PurchasedPackage::class);
    }
}
