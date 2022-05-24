<?php

namespace Pnp\Sdk\Builders\Users;

use Pnp\Sdk\Builders\UserResourceBuilder;
use Pnp\Sdk\CollectionBuilder;
use Pnp\Sdk\Resources\ConsensusReport;

class ConsensusReportCollectionBuilder extends CollectionBuilder
{
    /**
     * ConsensusReportCollectionBuilder constructor.
     *
     * @param  UserResourceBuilder  $builder
     */
    public function __construct(UserResourceBuilder $builder)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/consensus-reports', ConsensusReport::class);
    }
}
