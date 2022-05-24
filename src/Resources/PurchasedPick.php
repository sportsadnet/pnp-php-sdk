<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class PurchasedPick
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $pickId
 * @property int $pick_id
 *
 * @property Pick|null $pick
 *
 * @property array|PurchasedPackage[]|null $receivedFromPackages
 * @property array|PurchasedPackage[]|null $received_from_packages
 *
 * @property array|PurchasedSubscription[]|null $receivedFromSubscriptions
 * @property array|PurchasedSubscription[]|null $received_from_subscriptions
 */
class PurchasedPick extends Resource
{
    /**
     * {@inheritDoc}
     *
     * @return string[]
     */
    public function getCasts(): array
    {
        return [
            'pick_id' => 'int',
        ];
    }

    /**
     * Cast the pick relation.
     *
     * @param  array  $pick
     * @return Pick
     */
    public function castPick(array $pick): Pick
    {
        return new Pick($pick);
    }

    /**
     * Cast the received from packages relation.
     *
     * @param  array  $packages
     * @return PurchasedPackage[]
     */
    public function castReceivedFromPackages(array $packages): array
    {
        return array_map(function ($package) {
            return new PurchasedPackage($package);
        }, $packages);
    }

    /**
     * Cast the received from subscriptions relation.
     *
     * @param  array  $subscriptions
     * @return PurchasedSubscription[]
     */
    public function castReceivedFromSubscriptions(array $subscriptions): array
    {
        return array_map(function ($subscription) {
            return new PurchasedSubscription($subscription);
        }, $subscriptions);
    }
}
