<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

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
 * @property AiTeam $homeTeam
 * @property AiTeam $awayTeam
 */
class AiGame extends Resource
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

    protected function castPredictions(array $value): array
    {
        return $value;
    }

    protected function castHomeTeam(array $value)
    {
        return new AiTeam($value);
    }

    protected function castAwayTeam(array $value)
    {
        return new AiTeam($value);
    }
}
