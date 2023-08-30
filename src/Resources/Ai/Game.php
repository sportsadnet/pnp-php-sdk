<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources\Ai;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Game
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 */
class Game extends Resource
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
            'date' => 'datetime',
            'venue' => 'string',
        ];
    }
}
