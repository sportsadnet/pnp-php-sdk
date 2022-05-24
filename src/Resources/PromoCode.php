<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use Pnp\Sdk\Resource;

/**
 * Class PromoCode
 *
 * @package Pnp\Sdk\Resources
 *
 * @property string $code
 * @property string $type
 * @property string $value
 */
class PromoCode extends Resource
{
    /**
     * {@inheritDoc}
     *
     * @return string[]
     */
    public function getCasts(): array
    {
        return [
            'code' => 'string',
            'type' => 'string',
            'value' => 'string',
        ];
    }
}
