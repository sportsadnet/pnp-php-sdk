<?php

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * @property int $id
 *
 * @property string $itemType
 * @property string $item_type
 *
 * @property int $itemId
 * @property int $item_id
 *
 * @property Package|Subscription|null $item
 */
class FeaturedItem extends Resource
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
            'item_type' => 'string',
            'item_id' => 'int',
        ];
    }

    /**
     * Cast the item relation.
     *
     * @param  array  $item
     * @return Package|Subscription|null
     */
    protected function castItem(array $item)
    {
        if ($this->itemType === 'package') {
            return new Package($item);
        }

        if ($this->itemType === 'subscription') {
            return new Subscription($item);
        }

        return null;
    }
}
