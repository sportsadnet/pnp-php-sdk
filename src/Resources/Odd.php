<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class Odd
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $gameId
 * @property int $game_id
 *
 * @property int $bookmakerId
 * @property int $bookmaker_id
 *
 * @property string $awaySpread
 * @property string $away_spread
 *
 * @property string $awaySpreadPrice
 * @property string $away_spread_price
 *
 * @property string $homeSpread
 * @property string $home_spread
 *
 * @property string $homeSpreadPrice
 * @property string $home_spread_price
 *
 * @property string $awayMoneyLine
 * @property string $away_money_line
 *
 * @property string $homeMoneyLine
 * @property string $home_money_line
 *
 * @property string $total
 *
 * @property string $overPrice
 * @property string $over_price
 *
 * @property string $underPrice
 * @property string $under_price
 *
 * @property Game|null $game
 *
 * @property Bookmaker|null $bookmaker
 */
class Odd extends Resource
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
            'bookmaker_id' => 'int',
            'away_spread' => 'string',
            'away_spread_price' => 'string',
            'home_spread' => 'string',
            'home_spread_price' => 'string',
            'away_money_line' => 'string',
            'home_money_line' => 'string',
            'total' => 'string',
            'over_price' => 'string',
            'under_price' => 'string',
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
