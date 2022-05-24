<?php

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Client;
use Pnp\Sdk\CollectionBuilder;

class PasswordResetCollectionBuilder extends CollectionBuilder
{
    /**
     * PasswordResetCollectionBuilder constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        // TODO: Add resource class?
        parent::__construct($client, 'password-resets');
    }
}
