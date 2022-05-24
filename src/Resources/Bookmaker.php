<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class Bookmaker
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property string $name
 *
 * @property string $display
 *
 * @property bool $builtIn
 * @property bool $built_in
 */
class Bookmaker extends Resource
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
            'name' => 'string',
            'display' => 'string',
            'built_in' => 'bool',
        ];
    }
}
