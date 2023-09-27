<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources\Betyardai;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 * @property string $sid
 * @property DateTimeInterface $date
 * @property string $venue
 * @property array|null $predictions
 * @property Team $homeTeam
 * @property Team $awayTeam
 */
class Game extends Resource
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
            'sid' => 'string',
            'date' => 'datetime',
            'venue' => 'string',
        ];
    }

    protected function castProjections(array $value): array
    {
        return $value;
    }

    protected function castPredictions(array $value): array
    {
        return $value;
    }

    protected function castHomeTeam(array $value)
    {
        return new Team($value);
    }

    protected function castAwayTeam(array $value)
    {
        return new Team($value);
    }
}
