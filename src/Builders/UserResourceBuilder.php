<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk\Builders;

use Pnp\Sdk\Builders\Users\ConsensusReportCollectionBuilder;
use Pnp\Sdk\Builders\Users\ConsensusReportResourceBuilder;
use Pnp\Sdk\Builders\Users\OrderCollectionBuilder;
use Pnp\Sdk\Builders\Users\OrderItemCollectionBuilder;
use Pnp\Sdk\Builders\Users\OrderItemResourceBuilder;
use Pnp\Sdk\Builders\Users\OrderResourceBuilder;
use Pnp\Sdk\Builders\Users\PackageCollectionBuilder;
use Pnp\Sdk\Builders\Users\PackageResourceBuilder;
use Pnp\Sdk\Builders\Users\PickCollectionBuilder;
use Pnp\Sdk\Builders\Users\PickResourceBuilder;
use Pnp\Sdk\Builders\Users\RefundCollectionBuilder;
use Pnp\Sdk\Builders\Users\RefundResourceBuilder;
use Pnp\Sdk\Builders\Users\SubscriptionCollectionBuilder;
use Pnp\Sdk\Builders\Users\SubscriptionResourceBuilder;
use Pnp\Sdk\Client;
use Pnp\Sdk\ResourceBuilder;
use Pnp\Sdk\Resources\User;

class UserResourceBuilder extends ResourceBuilder
{
    /**
     * UserResourceBuilder constructor.
     *
     * @param  Client  $client
     * @param  string  $id
     */
    public function __construct(Client $client, string $id)
    {
        parent::__construct($client, 'users', $id, User::class);
    }

    /**
     * /users/{id}/picks
     *
     * @return PickCollectionBuilder
     */
    public function picks(): PickCollectionBuilder
    {
        return new PickCollectionBuilder($this);
    }

    /**
     * /users/{id}/picks/{id}
     *
     * @param  string  $id
     * @return PickResourceBuilder
     */
    public function pick(string $id): PickResourceBuilder
    {
        return new PickResourceBuilder($this, $id);
    }

    public function aiGames(): \Pnp\Sdk\Builders\Users\Ai\GameCollectionBuilder
    {
        return new \Pnp\Sdk\Builders\Users\Ai\GameCollectionBuilder($this);
    }

    public function aiGame(string $id): \Pnp\Sdk\Builders\Users\Ai\GameResourceBuilder
    {
        return new \Pnp\Sdk\Builders\Users\Ai\GameResourceBuilder($this, $id);
    }

    /**
     * /users/{id}/packages
     *
     * @return PackageCollectionBuilder
     */
    public function packages(): PackageCollectionBuilder
    {
        return new PackageCollectionBuilder($this);
    }

    /**
     * /users/{id}/packages/{id}
     *
     * @param  string  $id
     * @return PackageResourceBuilder
     */
    public function package(string $id): PackageResourceBuilder
    {
        return new PackageResourceBuilder($this, $id);
    }

    /**
     * /users/{id}/subscriptions
     *
     * @return SubscriptionCollectionBuilder
     */
    public function subscriptions(): SubscriptionCollectionBuilder
    {
        return new SubscriptionCollectionBuilder($this);
    }

    /**
     * /users/{id}/subscriptions/{id}
     *
     * @param  string  $id
     * @return SubscriptionResourceBuilder
     */
    public function subscription(string $id): SubscriptionResourceBuilder
    {
        return new SubscriptionResourceBuilder($this, $id);
    }

    /**
     * /users/{id}/consensus-reports
     *
     * @return ConsensusReportCollectionBuilder
     */
    public function consensusReports(): ConsensusReportCollectionBuilder
    {
        return new ConsensusReportCollectionBuilder($this);
    }

    /**
     * /users/{id}/consensus-reports/{id}
     *
     * @param  string  $id
     * @return ConsensusReportResourceBuilder
     */
    public function consensusReport(string $id): ConsensusReportResourceBuilder
    {
        return new ConsensusReportResourceBuilder($this, $id);
    }

    /**
     * /users/{id}/orders
     *
     * @return OrderCollectionBuilder
     */
    public function orders(): OrderCollectionBuilder
    {
        return new OrderCollectionBuilder($this);
    }

    /**
     * /users/{id}/orders/{id}
     *
     * @param  string  $id
     * @return OrderResourceBuilder
     */
    public function order(string $id): OrderResourceBuilder
    {
        return new OrderResourceBuilder($this, $id);
    }

    /**
     * /users/{id}/order-items
     *
     * @return OrderItemCollectionBuilder
     */
    public function orderItems(): OrderItemCollectionBuilder
    {
        return new OrderItemCollectionBuilder($this);
    }

    /**
     * /users/{id}/order-items/{id}
     *
     * @param  string  $id
     * @return OrderItemResourceBuilder
     */
    public function orderItem(string $id): OrderItemResourceBuilder
    {
        return new OrderItemResourceBuilder($this, $id);
    }

    /**
     * /users/{id}/refunds
     *
     * @return RefundCollectionBuilder
     */
    public function refunds(): RefundCollectionBuilder
    {
        return new RefundCollectionBuilder($this);
    }

    /**
     * /users/{id}/refunds/{id}
     *
     * @param  string  $id
     * @return RefundResourceBuilder
     */
    public function refund(string $id): RefundResourceBuilder
    {
        return new RefundResourceBuilder($this, $id);
    }
}
