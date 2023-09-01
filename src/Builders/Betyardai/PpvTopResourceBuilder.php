<?php

namespace Pnp\Sdk\Builders\Betyardai;

use Pnp\Sdk\Client;
use Pnp\Sdk\DataBuilder;
use Pnp\Sdk\Resources\Betyardai\PpvTop;

class PpvTopResourceBuilder extends DataBuilder
{
    /**
     * PicksCollectionBuilder constructor.
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'ppv-top', PpvTop::class);
    }
}
