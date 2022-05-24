<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Game
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $leagueId
 * @property int $league_id
 *
 * @property DateTimeInterface $gameDateTime
 * @property DateTimeInterface $game_date_time
 *
 * @property int $awayTeamId
 * @property int $away_team_id
 *
 * @property int $homeTeamId
 * @property int $home_team_id
 *
 * @property int $awayScore
 * @property int $homeScore
 *
 * @property string $status
 *
 * @property League|null $league
 *
 * @property GameTeam|null $awayTeam
 * @property GameTeam|null $away_team
 *
 * @property GameTeam|null $homeTeam
 * @property GameTeam|null $home_team
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
            'league_id' => 'int',
            'game_date_time' => 'datetime',
            'away_team_id' => 'int',
            'home_team_id' => 'int',
            'away_score' => 'int',
            'home_score' => 'int',
            'status' => 'string',
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

    /**
     * Cast the away team relation.
     *
     * @param  array  $awayTeam
     * @return GameTeam
     */
    protected function castAwayTeam(array $awayTeam): GameTeam
    {
        return new GameTeam($awayTeam);
    }

    /**
     * Cast the home team relation.
     *
     * @param  array  $homeTeam
     * @return GameTeam
     */
    protected function castHomeTeam(array $homeTeam): GameTeam
    {
        return new GameTeam($homeTeam);
    }
}
