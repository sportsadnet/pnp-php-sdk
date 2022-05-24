<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class User
 *
 * @package Pnp\Sdk\Resources
 *
 * @property string $email
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
 * @property int $countryId
 * @property int $country_id
 *
 * @property int $stateId
 * @property int $state_id
 *
 * @property string $city
 *
 * @property string $zip
 *
 * @property string $phone
 *
 * @property string $balance
 *
 * @property string $bonusCash
 * @property string $bonus_cash
 *
 * @property DateTimeInterface $createdAt
 * @property DateTimeInterface $created_at
 *
 * @property DateTimeInterface $updatedAt
 * @property DateTimeInterface $updated_at
 *
 * @property Country|null $country
 *
 * @property State|null $state
 */
class User extends Resource
{
    public function getCasts(): array
    {
        return [
            'email' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'full_name' => 'string',
            'country_id' => 'int',
            'state_id' => 'int',
            'city' => 'string',
            'zip' => 'string',
            'phone' => 'string',
            'balance' => 'string',
            'bonus_cash' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Cast the country relation.
     *
     * @param  array  $country
     * @return Country
     */
    protected function castCountry(array $country): Country
    {
        return new Country($country);
    }

    /**
     * Cast the state relation.
     *
     * @param  array  $state
     * @return State
     */
    protected function castState(array $state): State
    {
        return new State($state);
    }
}
