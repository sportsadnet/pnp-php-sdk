<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk;

use Pnp\Sdk\Builders\AiGameCollectionBuilder;
use Pnp\Sdk\Builders\AiGameResourceBuilder;
use Pnp\Sdk\Builders\AiPpvTopResourceBuilder;
use Pnp\Sdk\Builders\CapperCollectionBuilder;
use Pnp\Sdk\Builders\CapperResourceBuilder;
use Pnp\Sdk\Builders\CountryCollectionBuilder;
use Pnp\Sdk\Builders\CountryResourceBuilder;
use Pnp\Sdk\Builders\FeaturedItemCollectionBuilder;
use Pnp\Sdk\Builders\GameCollectionBuilder;
use Pnp\Sdk\Builders\GameResourceBuilder;
use Pnp\Sdk\Builders\LeaderCollectionBuilder;
use Pnp\Sdk\Builders\LeaderResourceBuilder;
use Pnp\Sdk\Builders\LeagueCollectionBuilder;
use Pnp\Sdk\Builders\LeagueResourceBuilder;
use Pnp\Sdk\Builders\OddCollectionBuilder;
use Pnp\Sdk\Builders\OddResourceBuilder;
use Pnp\Sdk\Builders\OrderCollectionBuilder;
use Pnp\Sdk\Builders\PackageCollectionBuilder;
use Pnp\Sdk\Builders\PackageResourceBuilder;
use Pnp\Sdk\Builders\PasswordResetCollectionBuilder;
use Pnp\Sdk\Builders\PickCollectionBuilder;
use Pnp\Sdk\Builders\PickResourceBuilder;
use Pnp\Sdk\Builders\PromoCodeResourceBuilder;
use Pnp\Sdk\Builders\SeasonCollectionBuilder;
use Pnp\Sdk\Builders\SeasonResourceBuilder;
use Pnp\Sdk\Builders\SessionCollectionBuilder;
use Pnp\Sdk\Builders\SessionResourceBuilder;
use Pnp\Sdk\Builders\StateCollectionBuilder;
use Pnp\Sdk\Builders\StateResourceBuilder;
use Pnp\Sdk\Builders\SubscriptionCollectionBuilder;
use Pnp\Sdk\Builders\SubscriptionResourceBuilder;
use Pnp\Sdk\Builders\UserCollectionBuilder;
use Pnp\Sdk\Builders\UserResourceBuilder;

/**
 * Trait HasRequests
 *
 * @package Pnp\Sdk
 * @mixin Client
 */
trait HasRequests
{
    /**
     * The client instance inherited on Client.
     *
     * @var Client
     */
    private Client $client;

    /**
     * Set the client of the requests.
     *
     * @param  Client  $client
     * @return $this
     * @noinspection PhpMissingReturnTypeInspection
     */
    protected function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get the client of the requests.
     *
     * @return Client
     */
    protected function getClient(): Client
    {
        return $this->client;
    }

    // --------------------------------------------------------------------------

    /**
     * /users
     *
     * @return UserCollectionBuilder
     */
    public function users(): UserCollectionBuilder
    {
        return new UserCollectionBuilder($this->getClient());
    }

    /**
     * /users/{id}
     *
     * @param  string  $id
     * @return UserResourceBuilder
     */
    public function user(string $id): UserResourceBuilder
    {
        return new UserResourceBuilder($this->getClient(), $id);
    }

    /**
     * /sessions
     *
     * @return SessionCollectionBuilder
     */
    public function sessions(): SessionCollectionBuilder
    {
        return new SessionCollectionBuilder($this->getClient());
    }

    /**
     * /sessions/{id}
     *
     * @param  string  $id
     * @return SessionResourceBuilder
     */
    public function session(string $id): SessionResourceBuilder
    {
        return new SessionResourceBuilder($this->getClient(), $id);
    }

    /**
     * /password-resets
     *
     * @return PasswordResetCollectionBuilder
     */
    public function passwordResets(): PasswordResetCollectionBuilder
    {
        return new PasswordResetCollectionBuilder($this->getClient());
    }

    /**
     * /leagues
     *
     * @return LeagueCollectionBuilder
     */
    public function leagues(): LeagueCollectionBuilder
    {
        return new LeagueCollectionBuilder($this->getClient());
    }

    /**
     * /leagues/{id}
     *
     * @param  string  $id
     * @return LeagueResourceBuilder
     */
    public function league(string $id): LeagueResourceBuilder
    {
        return new LeagueResourceBuilder($this->getClient(), $id);
    }

    /**
     * /seasons
     *
     * @return SeasonCollectionBuilder
     */
    public function seasons(): SeasonCollectionBuilder
    {
        return new SeasonCollectionBuilder($this->getClient());
    }

    /**
     * /seasons/{id}
     *
     * @param  string  $id
     * @return SeasonResourceBuilder
     */
    public function season(string $id): SeasonResourceBuilder
    {
        return new SeasonResourceBuilder($this->getClient(), $id);
    }

    /**
     * /games
     *
     * @return GameCollectionBuilder
     */
    public function games(): GameCollectionBuilder
    {
        return new GameCollectionBuilder($this->getClient());
    }

    /**
     * /games/{id}
     *
     * @param  string  $id
     * @return GameResourceBuilder
     */
    public function game(string $id): GameResourceBuilder
    {
        return new GameResourceBuilder($this->getClient(), $id);
    }

    /**
     * /odds
     *
     * @return OddCollectionBuilder
     */
    public function odds(): OddCollectionBuilder
    {
        return new OddCollectionBuilder($this->getClient());
    }

    /**
     * /odds/{id}
     *
     * @param  string  $id
     * @return OddResourceBuilder
     */
    public function odd(string $id): OddResourceBuilder
    {
        return new OddResourceBuilder($this->getClient(), $id);
    }

    /**
     * @return OrderCollectionBuilder
     */
    public function orders(): OrderCollectionBuilder
    {
        return  new OrderCollectionBuilder($this->getClient());
    }

    /**
     * /cappers
     *
     * @return CapperCollectionBuilder
     */
    public function cappers(): CapperCollectionBuilder
    {
        return new CapperCollectionBuilder($this->getClient());
    }

    /**
     * /cappers/{id}
     *
     * @param  string  $id
     * @return CapperResourceBuilder
     */
    public function capper(string $id): CapperResourceBuilder
    {
        return new CapperResourceBuilder($this->getClient(), $id);
    }

    /**
     * /leaders
     *
     * @return LeaderCollectionBuilder
     */
    public function leaders(): LeaderCollectionBuilder
    {
        return new LeaderCollectionBuilder($this->getClient());
    }

    /**
     * /leaders/{id}
     *
     * @param  string  $id
     * @return LeaderResourceBuilder
     */
    public function leader(string $id): LeaderResourceBuilder
    {
        return new LeaderResourceBuilder($this->getClient(), $id);
    }

    /**
     * /picks
     *
     * @return PickCollectionBuilder
     */
    public function picks(): PickCollectionBuilder
    {
        return new PickCollectionBuilder($this->getClient());
    }

    /**
     * /picks/{id}
     *
     * @param  string  $id
     * @return PickResourceBuilder
     */
    public function pick(string $id): PickResourceBuilder
    {
        return new PickResourceBuilder($this->getClient(), $id);
    }

    /**
     * /packages
     *
     * @return PackageCollectionBuilder
     */
    public function packages(): PackageCollectionBuilder
    {
        return new PackageCollectionBuilder($this->getClient());
    }

    /**
     * /packages/{id}
     *
     * @param  string  $id
     * @return PackageResourceBuilder
     */
    public function package(string $id): PackageResourceBuilder
    {
        return new PackageResourceBuilder($this->getClient(), $id);
    }

    /**
     * /subscriptions
     *
     * @return SubscriptionCollectionBuilder
     */
    public function subscriptions(): SubscriptionCollectionBuilder
    {
        return new SubscriptionCollectionBuilder($this->getClient());
    }

    /**
     * /subscriptions/{id}
     *
     * @param  string  $id
     * @return SubscriptionResourceBuilder
     */
    public function subscription(string $id): SubscriptionResourceBuilder
    {
        return new SubscriptionResourceBuilder($this->getClient(), $id);
    }

    /**
     * /promo-codes/{id}
     *
     * @param  string  $id
     * @return PromoCodeResourceBuilder
     */
    public function promoCode(string $id): PromoCodeResourceBuilder
    {
        return new PromoCodeResourceBuilder($this->getClient(), $id);
    }

    /**
     * /featured-items
     *
     * @return FeaturedItemCollectionBuilder
     */
    public function featuredItems(): FeaturedItemCollectionBuilder
    {
        return new FeaturedItemCollectionBuilder($this->getClient());
    }

    /**
     * /countries
     *
     * @return CountryCollectionBuilder
     */
    public function countries(): CountryCollectionBuilder
    {
        return new CountryCollectionBuilder($this->getClient());
    }

    /**
     * /countries/{id}
     *
     * @param  string  $id
     * @return CountryResourceBuilder
     */
    public function country(string $id): CountryResourceBuilder
    {
        return new CountryResourceBuilder($this->getClient(), $id);
    }

    /**
     * /states
     *
     * @return StateCollectionBuilder
     */
    public function states(): StateCollectionBuilder
    {
        return new StateCollectionBuilder($this->getClient());
    }

    /**
     * /states/{id}
     *
     * @param  string  $id
     * @return StateResourceBuilder
     */
    public function state(string $id): StateResourceBuilder
    {
        return new StateResourceBuilder($this->getClient(), $id);
    }

    /**
     * /ai/games
     */
    public function aiGames(): AiGameCollectionBuilder
    {
        return new AiGameCollectionBuilder($this->getClient());
    }

    /**
     * /ai/games/{id}
     */
    public function aiGame(string $id): AiGameResourceBuilder
    {
        return new AiGameResourceBuilder($this->getClient(), $id);
    }

    /**
     * /ai/games/{id}
     */
    public function aiPpvTop(string $id): AiPpvTopResourceBuilder
    {
        return new AiPpvTopResourceBuilder($this->getClient());
    }
}
