<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Pick
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int|null $capperId
 * @property int|null $capper_id
 *
 * @property int|null $seasonId
 * @property int|null $season_id
 *
 * @property int $gameId
 * @property int $game_id
 *
 * @property int $leagueId
 * @property int $league_id
 *
 * @property int $awayTeamId
 * @property int $away_team_id
 *
 * @property int $homeTeamId
 * @property int $home_team_id
 *
 * @property DateTimeInterface $gameDateTime
 * @property DateTimeInterface $game_date_time
 *
 * @property string $title
 *
 * @property string|null $description
 *
 * @property bool $premium
 *
 * @property string|null $result;
 *
 * @property string $profit;
 *
 * @property DateTimeInterface $createdAt
 * @property DateTimeInterface $created_at
 *
 * @property DateTimeInterface $updatedAt
 * @property DateTimeInterface $updated_at
 *
 * @property int|null $awayScore
 * @property int|null $away_score
 *
 * @property int|null $homeScore
 * @property int|null $home_score
 *
 * @property int|null $bookmakerId
 * @property int|null $bookmaker_id
 *
 * @property string|null $oddType
 * @property string|null $odd_type
 *
 * @property string|null $price
 *
 * @property string|null $spread
 *
 * @property string|null $total
 *
 * @property bool $playOn
 * @property bool $play_on
 *
 * @property string $playOnFormatted
 * @property string $play_on_formatted
 *
 * @property Capper|null $capper
 *
 * @property Season|null $season
 *
 * @property Game|null $game
 *
 * @property League|null $league
 *
 * @property Bookmaker|null $bookmaker
 *
 * @property GameTeam|null $awayTeam
 * @property GameTeam|null $away_team
 *
 * @property GameTeam|null $homeTeam
 * @property GameTeam|null $home_team
 */
class Pick extends Resource
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
            'capper_id' => 'int',
            'season_id' => 'int',
            'game_id' => 'int',
            'league_id' => 'int',
            'away_team_id' => 'int',
            'home_team_id' => 'int',
            'game_date_time' => 'datetime',
            'title' => 'string',
            'description' => 'string',
            'premium' => 'bool',
            'result' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'away_score' => 'int',
            'home_score' => 'int',
            'play_on' => 'bool',
            'play_on_formatted' => 'string',
        ];
    }

    /**
     * Cast the capper relation.
     *
     * @param  array  $capper
     * @return Capper
     */
    protected function castCapper(array $capper): Capper
    {
        return new Capper($capper);
    }

    /**
     * Cast the season relation.
     *
     * @param  array  $season
     * @return Season
     */
    protected function castSeason(array $season): Season
    {
        return new Season($season);
    }

    /**
     * Cast the game relation.
     *
     * @param  array  $game
     * @return Game
     */
    protected function castGame(array $game): Game
    {
        return new Game($game);
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
     * Cast the bookmaker relation.
     *
     * @param  array  $bookmaker
     * @return Bookmaker
     */
    protected function castBookmaker(array $bookmaker): Bookmaker
    {
        return new Bookmaker($bookmaker);
    }
}
