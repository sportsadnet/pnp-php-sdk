<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class State
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 * @property string $code
 * @property string $title
 */
class State extends Resource
{
    /**
     * {@inheritDoc}
     *
     * @return string[]
     */
    public function getCasts(): array
    {
        return [
            'id' => 'int',
            'code' => 'string',
            'title' => 'string',
        ];
    }
}
