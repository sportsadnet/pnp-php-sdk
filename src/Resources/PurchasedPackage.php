<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class PurchasedPackage
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $packageId
 * @property int $package_id
 *
 * @property DateTimeInterface $purchasedAt
 * @property DateTimeInterface $purchased_at
 *
 * @property Package|null $package
 */
class PurchasedPackage extends Resource
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
            'package_id' => 'int',
            'purchased_at' => 'datetime',
        ];
    }

    /**
     * Cast the package relation.
     *
     * @param  array  $package
     * @return Package
     */
    protected function castPackage(array $package): Package
    {
        return new Package($package);
    }
}
