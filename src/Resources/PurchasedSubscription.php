<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class PurchasedSubscription
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $subscriptionId
 * @property int $subscription_id
 *
 * @property string $leagueGroup
 * @property string $league_group
 *
 * @property DateTimeInterface $purchasedAt
 * @property DateTimeInterface $purchased_at
 *
 * @property DateTimeInterface $startsAt
 * @property DateTimeInterface $starts_at
 *
 * @property DateTimeInterface $expiresAt
 * @property DateTimeInterface $expires_at
 *
 * @property array|Capper[]|null $cappers
 *
 * @property array|League[]|null $leagues
 *
 * @property Subscription|null $subscription
 */
class PurchasedSubscription extends Resource
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
            'subscription_id' => 'int',
            'league_group' => 'string',
            'purchased_at' => 'datetime',
            'starts_at' => 'datetime',
            'expires_at' => 'datetime',
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

    /**
     * Cast the subscription relation.
     *
     * @param  array  $subscription
     * @return Subscription
     */
    protected function castSubscription(array $subscription): Subscription
    {
        return new Subscription($subscription);
    }
}
