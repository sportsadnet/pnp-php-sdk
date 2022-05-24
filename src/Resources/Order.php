<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Resources;

use DateTimeInterface;
use Pnp\Sdk\Resource;

/**
 * Class Order
 *
 * @package Pnp\Sdk\Resources
 *
 * @property int $id
 *
 * @property string $orderNumber
 * @property string $order_number
 *
 * @property string|null $transactionNumber
 * @property string|null $transaction_number
 *
 * @property string|null $paymentMethod
 * @property string|null $payment_method
 *
 * @property string $subtotalPrice
 * @property string $subtotal_price
 *
 * @property string $discountDeduction
 * @property string $discount_deduction
 *
 * @property string $bonusCashDeduction
 * @property string $bonus_cash_deduction
 *
 * @property string $balanceDeduction
 * @property string $balance_deduction
 *
 * @property string $totalPrice
 * @property string $total_price
 *
 * @property string $email
 *
 * @property string $firstName
 * @property string $first_name
 *
 * @property string $lastName
 * @property string $last_name
 *
 * @property string $city
 *
 * @property string $state
 *
 * @property string $country
 *
 * @property string $zip
 *
 * @property string $phone
 *
 * @property DateTimeInterface|null $completedAt
 * @property DateTimeInterface|null $completed_at
 *
 * @property int $itemsCount
 * @property int $items_count
 *
 * @property array|OrderItem[]|null $items
 *
 * @property PromoCode|null $promoCode
 * @property PromoCode|null $promo_code
 */
class Order extends Resource
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
            'order_number' => 'string',
            'transaction_number' => 'string',
            'payment_method' => 'string',
            'subtotal_price' => 'string',
            'discount_deduction' => 'string',
            'bonus_cash_deduction' => 'string',
            'balance_deduction' => 'string',
            'total_price' => 'string',
            'email' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'city' => 'string',
            'state' => 'string',
            'country' => 'string',
            'zip' => 'string',
            'phone' => 'string',
            'completed_at' => 'datetime',
            'items_count' => 'int',
        ];
    }

    /**
     * Cast the items relation.
     *
     * @param  array  $items
     * @return OrderItem[]
     */
    protected function castItems(array $items): array
    {
        return array_map(function ($item) {
            return new OrderItem($item);
        }, $items);
    }

    /**
     * Cast the promo code relation.
     *
     * @param  array|null  $promoCode
     * @return PromoCode|null
     */
    protected function castPromoCode(?array $promoCode): ?PromoCode
    {
        return $promoCode ? new PromoCode($promoCode) : null;
    }
}
