<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\Season;

class SeasonResourceBuilder extends ResourceBuilder
{
    /**
     * SeasonResourceBuilder constructor.
     *
     * @param  Client  $client
     * @param  string  $id
     */
    public function __construct(Client $client, string $id)
    {
        parent::__construct($client, 'seasons', $id, Season::class);
    }
}
