<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Refund
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property int $itemId
 * @property int $item_id
 *
 * @property string $price
 *
 * @property string $description
 *
 * @property bool $actualRefund
 * @property bool $actual_refund
 *
 * @property DateTimeInterface $createdAt
 * @property DateTimeInterface $created_at
 *
 * @property OrderItem|null $item
 */
class Refund extends Resource
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
            'item_id' => 'int',
            'price' => 'string',
            'description' => 'string',
            'actual_refund' => 'bool',
            'created_at' => 'datetime',
        ];
    }

    /**
     * Cast the item relation.
     *
     * @param  array  $item
     * @return OrderItem
     */
    protected function castItem(array $item): OrderItem
    {
        return new OrderItem($item);
    }
}
