<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources\Betyardai;

use Pnp\Sdk\Resource;

/**
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 * @property array|null $unit_top
 * @property array|null $position_top
 */
class PpvTop extends Resource
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
        ];
    }

    protected function castUnitTop(array $value): array
    {
        return $value;
    }

    protected function castPositionTop(array $value): array
    {
        return $value;
    }
}
