<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Season
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $leagueId
 * @property int $league_id
 *
 * @property string $title
 *
 * @property DateTimeInterface $startDate
 * @property DateTimeInterface $start_date
 *
 * @property DateTimeInterface $endDate
 * @property DateTimeInterface $end_date
 *
 * @property League|null $league
 */
class Season extends Resource
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
            'league_id' => 'int',
            'title' => 'string',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    /**
     * Cast the league relation.
     *
     * @param  array  $league
     * @return League
     */
    protected function castLeague(array $league): League
    {
        return new League($league);
    }
}
