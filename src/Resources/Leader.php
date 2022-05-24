<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

/**
 * Class Leader
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $wins
 * @property int $losses
 * @property int $pushes
 * @property string $profit
 */
class Leader extends Capper
{
    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function getCasts(): array
    {
        return array_merge(parent::getCasts(), [
            'wins' => 'int',
            'losses' => 'int',
            'pushes' => 'int',
            'profit' => 'string',
        ]);
    }
}
