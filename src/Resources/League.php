<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class League
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property string $title
 *
 * @property bool $builtIn
 * @property bool $built_in
 */
class League extends Resource
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
            'built_in' => 'bool',
        ];
    }
}
