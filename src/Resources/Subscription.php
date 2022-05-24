<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Subscription
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property string $type
 *
 * @property array|int[] $capperIds
 * @property array|int[] $capper_ids
 *
 * @property string $periodType
 * @property string $period_type
 *
 * @property string|null $leagueGroup
 * @property string|null $league_group
 *
 * @property string $title
 *
 * @property string $description
 *
 * @property string $price
 *
 * @property int|null $lengthId
 * @property int|null $length_id
 *
 * @property string|null $lengthTitle
 * @property string|null $length_title
 *
 * @property DateTimeInterface|null $playsExpirationDate
 * @property DateTimeInterface|null $plays_expiration_date
 *
 * @property DateTimeInterface|null $purchaseExpirationDate
 * @property DateTimeInterface|null $purchase_expiration_date
 *
 * @property DateTimeInterface $createdAt
 * @property DateTimeInterface $created_at
 *
 * @property DateTimeInterface $updatedAt
 * @property DateTimeInterface $updated_at
 *
 * @property array|Capper[]|null $cappers
 *
 * @property array|League[]|null $leagues
 */
class Subscription extends Resource
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
            'type' => 'string',
            'period_type' => 'string',
            'league_group' => 'string',
            'title' => 'string',
            'description' => 'string',
            'price' => 'string',
            'length_id' => 'int',
            'length_title' => 'string',
            'plays_expiration_date' => 'datetime',
            'purchase_expiration_date' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Cast the cappers relation.
     *
     * @param  array  $cappers
     * @return Capper[]
     */
    protected function castCappers(array $cappers): array
    {
        return array_map(function ($capper) {
            return new Capper($capper);
        }, $cappers);
    }

    /**
     * Cast the leagues relation.
     *
     * @param  array  $leagues
     * @return League[]
     */
    protected function castLeagues(array $leagues): array
    {
        return array_map(function ($league) {
            return new League($league);
        }, $leagues);
    }

    // -------------------------------------------------------------------------------

    /**
     * Return true if the subscription is of period type "explicit".
     *
     * @return bool
     */
    public function isExplicit(): bool
    {
        // TODO: Use constant
        return $this->periodType === 'explicit';
    }

    /**
     * Return true if the subscription is of period type "explicit".
     *
     * @return bool
     */
    public function isRelative(): bool
    {
        // TODO: Use constant
        return $this->periodType === 'relative';
    }
}
