<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\DataBuilder;
use Pnp\Sdk\Resources\AiPpvTop;

class AiPpvTopResourceBuilder extends DataBuilder
{
    /**
     * PicksCollectionBuilder constructor.
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, 'ai/ppv-top', AiPpvTop::class);
    }
}
