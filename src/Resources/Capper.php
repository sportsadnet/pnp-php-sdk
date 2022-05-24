<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Capper
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property string $firstName
 * @property string $first_name
 *
 * @property string $lastName
 * @property string $last_name
 *
 * @property string $fullName
 * @property string $full_name
 *
 * @property string|null $imageUrl
 * @property string|null $image_url
 *
 * @property string $info
 *
 * @property string $hotStreaks
 * @property string $hot_streaks
 *
 * @property DateTimeInterface $createdAt
 * @property DateTimeInterface $created_at
 *
 * @property DateTimeInterface $updatedAt
 * @property DateTimeInterface $updated_at
 */
class Capper extends Resource
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
            'first_name' => 'string',
            'last_name' => 'string',
            'full_name' => 'string',
            'image_url' => 'string',
            'info' => 'string',
            'hot_streaks' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
