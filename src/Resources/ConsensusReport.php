<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class ConsensusReport
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $gameId
 * @property int $game_id
 *
 * @property int $picksCount
 * @property int $picks_count
 *
 * @property int $awaySpreadCount
 * @property int $away_spread_count
 * @property int $homeSpreadCount
 * @property int $home_spread_count
 *
 * @property int $awayMoneyLineCount
 * @property int $away_money_line_count
 *
 * @property int $homeMoneyLineCount
 * @property int $home_money_line_count
 *
 * @property int $overCount
 * @property int $over_count
 *
 * @property int $underCount
 * @property int $under_count
 *
 * @property Game|null $game
 */
class ConsensusReport extends Resource
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
            'game_id' => 'int',
            'picks_count' => 'int',
            'away_spread_count' => 'int',
            'home_spread_count' => 'int',
            'away_money_line_count' => 'int',
            'home_money_line_count' => 'int',
            'over_count' => 'int',
            'under_count' => 'int',
        ];
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
}
