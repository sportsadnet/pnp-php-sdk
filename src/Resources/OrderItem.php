<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class OrderItem
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $orderId
 * @property int $order_id
 *
 * @property string $type
 *
 * @property int|null $originalId
 * @property int|null $original_id
 *
 * @property int|null $purchasedId
 * @property int|null $purchased_id
 *
 * @property string $title
 *
 * @property string $price
 *
 * @property bool $guarantee
 *
 * @property Package|Subscription|null $originalItem
 * @property Package|Subscription|null $original_item
 *
 * @property PurchasedPackage|PurchasedSubscription|null $purchasedItem
 * @property PurchasedPackage|PurchasedSubscription|null $purchased_item
 */
class OrderItem extends Resource
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
            'order_id' => 'int',
            'type' => 'string',
            'original_id' => 'int',
            'purchased_id' => 'int',
            'title' => 'string',
            'price' => 'string',
            'guarantee' => 'bool',
        ];
    }

    /**
     * Cast the original item relation.
     *
     * @param  array  $item
     * @return Package|Subscription|null
     */
    protected function castOriginalItem(array $item)
    {
        if ($this->type === 'package') {
            return new Package($item);
        }

        if ($this->type === 'subscription') {
            return new Subscription($item);
        }

        return null;
    }

    /**
     * Cast the original item relation.
     *
     * @param  array  $item
     * @return PurchasedPackage|PurchasedSubscription|null
     */
    protected function castPurchasedItem(array $item)
    {
        if ($this->type === 'package') {
            return new PurchasedPackage($item);
        }

        if ($this->type === 'subscription') {
            return new PurchasedSubscription($item);
        }

        return null;
    }
}
