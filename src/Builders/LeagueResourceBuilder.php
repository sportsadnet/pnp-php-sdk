<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\League;

class LeagueResourceBuilder extends ResourceBuilder
{
    /**
     * LeagueResourceBuilder constructor.
     *
     * @param  Client  $client
     * @param  string  $id
     */
    public function __construct(Client $client, string $id)
    {
        parent::__construct($client, 'leagues', $id, League::class);
    }
}
