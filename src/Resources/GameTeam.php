<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class GameTeam
 *
 * @package Pnp\Sdk\Resource
 *
 * @property int $id
 * @property string $title
 */
class GameTeam extends Resource
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
            'title' => 'string',
        ];
    }
}
