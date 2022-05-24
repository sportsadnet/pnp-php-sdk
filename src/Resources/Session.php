<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class Session
 *
 * @package Pnp\Sdk\Resources
 *
 * @property string $accessToken
 * @property string $access_token
 *
 * @property int $expiresIn
 * @property int $expires_in
 */
class Session extends Resource
{
    /**
     * {@inheritDoc}
     *
     * @return string[]
     */
    public function getCasts(): array
    {
        return [
            'access_token' => 'string',
            'expires_in' => 'int',
        ];
    }
}
