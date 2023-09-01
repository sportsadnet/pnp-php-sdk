<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources\Betyardai;

use Pnp\Sdk\Resource;

/**
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 * @property int $game_id
 * @property string $short_name
 * @property bool $is_home
 * @property array $team_stats
 * @property array $ppv_stats
 */
class Team extends Resource
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
            'gameId' => 'int',
            'shortName' => 'string',
            'isHome' => 'bool',
        ];
    }

    protected function castTeamStats(array $value): array
    {
        return $value;
    }

    protected function castPpvStats(array $value): array
    {
        return $value;
    }
}
