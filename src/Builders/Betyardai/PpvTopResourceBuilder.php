<?php

namespace Pnp\Sdk\Builders\Betyardai;

use Pnp\Sdk\Builders\BetyardaiBuilder;
use Pnp\Sdk\DataBuilder;
use Pnp\Sdk\Resources\Betyardai\PpvTop;

class PpvTopResourceBuilder extends DataBuilder
{
    /**
     * PicksCollectionBuilder constructor.
     */
    public function __construct(BetyardaiBuilder $builder)
    {
        parent::__construct($builder->getClient(), $builder->getUri().'/ppv-top', PpvTop::class);
    }
}
