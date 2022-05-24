<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Package
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $capperId
 * @property int $capper_id
 *
 * @property string $title
 *
 * @property string $description
 *
 * @property bool $guarantee
 *
 * @property DateTimeInterface $firstGameDateTime
 * @property DateTimeInterface $first_game_date_time
 *
 * @property int|null $topPickIndex
 * @property int|null $top_pick_index
 *
 * @property string $price
 *
 * @property DateTimeInterface $createdAt
 * @property DateTimeInterface $created_at
 *
 * @property DateTimeInterface $updatedAt
 * @property DateTimeInterface $updated_at
 *
 * @property Capper|null $capper
 *
 * @property array|League[]|null $leagues
 *
 * @property array|Pick[]|null $picks
 */
class Package extends Resource
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
            'title' => 'string',
            'description' => 'string',
            'guarantee' => 'bool',
            'first_game_date_time' => 'datetime',
            'top_pick_index' => 'int',
            'price' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
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
     * Cast the leagues relation.
     *
     * @param  array  $leagues
     * @return array|League[]
     */
    protected function castLeagues(array $leagues): array
    {
        return array_map(function ($league) {
            return new League($league);
        }, $leagues);
    }

    /**
     * Cast the picks relation.
     *
     * @param  array  $picks
     * @return array
     */
    protected function castPicks(array $picks): array
    {
        return array_map(function ($pick) {
            return new Pick($pick);
        }, $picks);
    }
}
