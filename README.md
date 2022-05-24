# pnp-php-sdk

This is the PHP implementation of the PNP API.
It allows for easier, more direct API integration in your application.

[API Documentation](https://pnpbackend.docs.apiary.io)

## Requirements & Installation

The minimum required PHP version is `7.4` or `8.0`.
Your project must use [Composer](https://getcomposer.org/) for dependency management.
It's recommended that you know how to work with composer packages.

Put this repository link into the `composer.json` file repositories like so:
```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://gitlab.com/picks-and-parlays/pnp-php-sdk.git"
        }
    ]
}
```

Then require it by calling `composer require btb/pnp-php-sdk` from the command line, or additionally add this to your dependencies:

```json
{
    "require": {
        "btb/pnp-php-sdk": "*"
    }
}
```

You can learn more about composer repositories [here](https://getcomposer.org/doc/05-repositories.md).

Run `composer update` after that.

## Basic Usage

Once pulled, you should now be able to create an API client.

```php
use Pnp\Sdk\Client;

$api = new Client('https://api.picksandparlays.net/v1', 'your-site-secret');
```

You would now be able to call requests from that client.

```php
$cappers = $api->cappers()->get();
$capper = $api->capper(1)->get();
```

All available requests are listed at the very bottom of the page.

## Collection Builders

There are two types of URL builders available - `CollectionBuilder` and `ResourceBuilder`.

A `CollectionBuilder` references an entire collection of resources.
Basically explained, all plural methods (`cappers()`, `leagues()`, `sessions()`) return a `CollectionBuilder` instance.

```php
// Equivalent to "GET /cappers"
$cappers = $api->cappers()->get();

// Equivalent to "GET /leagues"
$leagues = $api->leagues()->get();
```

It can also be used to create items like so:
```php
$data = [
    'email' => 'test@example.com',
    'password' => 'secret',
];

// Equivalent to "POST /sessions"
// with JSON { "email": "test@example.com", "password": "secret" } as body
$session = $api->sessions()->create($data);
```

## Resource Builders
The `ResourceBuilder` references a single resource.
Basically all singular methods with an id as an argument (`capper(1)`, `league(1)`, `session('current')`).

```php
// Equivalent to "GET /cappers/1"
$capper = $api->capper(1)->get();

// Equivalent to "GET /leagues/1"
$league = $api->league(1)->get();

// Equivalent to "GET /users/current"
$user = $api->user('current')->get();
```

A single resource can be updated or deleted like so:

```php
// Equivalent to "PATCH /users/current"
// with JSON { "first_name": "Example" } as body.
$user = $api->user('current')->update(['first_name' => 'Example']);

// Equivalent to "DELETE /sessions/current"
$api->session('current')->delete();
```

## Appending Relationships

Both the `CollectionBuilder` and the `ResourceBuilder` contain method `with()` to request a relationship to be preloaded. Here's an example:

```php
// One relation
$picks = $api->picks()->with(['league'])->get();

// Multiple relations
$picks = $api->picks()->with(['league', 'capper'])->get();
```

## Filtering Collections

The `CollectionBuilder` contains the method `where()`, which is used to apply filters to the request like so:

```php
// A single filter applied
$picks = $api->picks()->where('result', '=', 'win')->get();

// Many filters can be chained as well
$picks = $api->picks()
    ->where('league_id', '=', 2)
    ->where('result', '=', 'win')
    ->get();
```

## Ordering Collections

The `CollectionBuilder` also contains a method `orderBy()` for ordering (sorting) collections. Here's how:

```php
// Order by "result". Default in ascending order
$picks = $api->picks()->orderBy('result')->get();

// Explicitly specify the ordering direction
$picks = $api->picks()->orderBy('result', 'desc')->get();

// Use an alternative helper method to sort in descending order
$picks = $api->picks()->orderByDesc('result')->get();
```

## Caching

It is very important to note that you must implement the `Pnp\Sdk\Contracts\CacheInterface` and pass an instance of the class to the API client constructor like so:

```php
use Pnp\Sdk\CacheInterface;

class YourCacheClass implements CacheInterface
{
    public function get(string $key): string
    {
        // Return the corresponding value to the provided key (not expired).
    }

    public function set(string $key, string $value, ?int $lifetime = null)
    {
        // Put a value of the key in the cache with the specified lifetime (null means forever).
    }

    public function has(string $key): bool
    {
        // Return true or false whether the specified key has any value (not expired).
        // In worst case scenario just do:
        // return $this->get($key) !== null;
    }
}
```

Having your class implementing the cache interface, you can now provide that in the API client constructor like so:

```php
use Pnp\Sdk\Client;
use YourCacheClass;

$cache = new YourCacheClass();

// This constructor is the same from the introduction.
// The third argument accepts an implementation of CacheInterface.
$api = new Client('https://api.picksandparlays.net/v1', 'your-site-secret', $cache);
```

After the API client has a provided cache implementation, you can use the `cache()` method available on all builders like so:

```php
// Cache the returned cappers for 60 seconds.
// Next time the cappers will be returned from the cache instead.
$cappers = $api->cappers()->cache(60)->get();

// Same with any ResourceBuilder.
$cappers = $api->capper(1)->cache(60)->get();
```

You can also only store the cached response but not retrieve on the next call. This is useful when you want to pre-cache a response in a cron to reduce load time on more performance-demanding pages. You can do that like so:

```php
// Assuming that you have some common request.
function cappers()
{
    return $api->cappers()->orderBy('full_name');
}

// This will cache the response, but next time it will still call the API.
$cappers = cappers()->cache(60)->override()->get();

// Anywhere else in your project you can retrieve the already cached response. If it hasn't been cached, it will be.
$cappers = cappers()->cache(60)->get();
```

Behind the scenes caching works by generating a hash of the request with all its relations, filters and ordering. This hash is used to identify whether two requests are identical and return a cached response if the hashes match.

> Only GET requests can be cached.

## Error Handling

When a request fails with a status code bigger or equal to `400` it will throw a `Pnp\Sdk\Exceptions\RequestException`. The `RequestException` contains the error code and message returned in the response. Most common codes are extracted to their own exceptions inheriting `RequestException` for easier catching. Here's a list of them:
- `InvalidSiteSecretException` - Equivalent to error code `INVALID_SITE_SECRET`
- `IpNotAllowedException` - Equivalent to error code `IP_NOT_ALLOWED`
- `MaintenanceException` - Equivalent to error code `MAINTENANCE`
- `NotFoundException` - Equivalent to error code `NOT_FOUND`
- `TooManyRequestsException` - Equivalent to error code `TOO_MANY_REQUESTS`
- `UserSuspendedException` - Equivalent to error code `USER_SUSPENDED`
- `UserUnauthenticatedException` - Equivalent to error code `USER_UNAUTHENTICATED`
- `ValidationErrorException` - Equivalent to error code `VALIDATION_ERROR`

The error codes are available in the [API documentation](https://pnpbackend.docs.apiary.io/#/introduction/response-errors).

Ideally you should have a generic fallback clause for any other error that might occur like so:
```php
try {
    // Your code
} catch (RequestException $e) {
    // Do someting if the request fails in any state
}
```

## Available Requests

Here are the available requests in the API client:
- `user(id)` - Equivalent to `/users/{id}` (learn more at [Account / Users](https://pnpbackend.docs.apiary.io/#/reference/account/users))
    - `orders()` - Equivalent to `/users/{id}/orders` (learn more at [Purchases / Orders](https://pnpbackend.docs.apiary.io/#/reference/purchases/orders))
    - `order(id)` - Equivalent to `/users/{id}/orders/id`
    - `orderItems()` - Equivalent to `/users/{id}/order-items` (learn more at [Purchases / Order Items](https://pnpbackend.docs.apiary.io/#/reference/purchases/order-items))
    - `orderItem(id)` - Equivalent to `/users/{id}/order-items/{id}`
    - `refunds()` - Equivalent to `/users/{id}/refunds` (learn more at [Purchases / Refunds](https://pnpbackend.docs.apiary.io/#/reference/purchases/refunds))
    - `refund(id)` - Equivalent to `/users/{id}/refunds/{id}`
    - `picks()` - Equivalent to `/users/{id}/picks` (learn more at [Purchases / Purchased Picks](https://pnpbackend.docs.apiary.io/#/reference/purchases/purchased-picks))
    - `pick(id)` - Equivalent to `/users/{id}/picks/{id}`
    - `packages()` - Equivalent to `/users/{id}/packages` (learn more at [Purchases / Purchased Packages](https://pnpbackend.docs.apiary.io/#/reference/purchases/purchased-packages))
    - `package(id)` - Equivalent to `/users/{id}/packages/{id}`
    - `subscriptions()` - Equivalent to `/users/{id}/subscriptions` (learn more at [Purchases / Purchased Subscriptions](https://pnpbackend.docs.apiary.io/#/reference/purchases/purchased-subscriptions))
    - `subscription(id)` - Equivalent to `/users/{id}/subscriptions/{id}`
    - `consensusReports()` - Equivalent to `/users/{id}/consensus-reports` (learn more at [Purchases / Consensus Reports](https://pnpbackend.docs.apiary.io/#/reference/purchases/consensus-reports))
    - `consensusReport(id)` - Equivalent to `/users/{id}/consensus-reports/{id}`
- `sessions()` - Equivalent to `/sessions` (learn more at [Account / Sessions](https://pnpbackend.docs.apiary.io/#/reference/account/sessions))
- `session(id)` - Equivalent to `/sessions/{id}`
- `passwordResets()` - Equivalent to `/password-resets` (learn more at [Account / Password Resets](https://pnpbackend.docs.apiary.io/#/reference/account/password-resets))
- `passwordReset(id)` - Equivalent to `/password-resets/{id}`
- `leagues()` - Equivalent to `/leagues` (learn more at [Games / Leagues](https://pnpbackend.docs.apiary.io/#/reference/games/leagues))
- `league(id)` - Equivalent to `/leagues/{id}`
- `seasons()` - Equivalent to `/seasons` (learn more at [Games / Seasons](https://pnpbackend.docs.apiary.io/#/reference/games/seasons))
- `season(id)` - Equivalent to `/seasons/{id}`
- `games()` - Equivalent to `/games` (learn more at [Games / Games](https://pnpbackend.docs.apiary.io/#/reference/games/games))
- `game(id)` - Equivalent to `/games/{id}`
- `odds()` - Equivalent to `/odds` (learn more at [Games / Odds](https://pnpbackend.docs.apiary.io/#/reference/games/odds))
- `odd(id)` - Equivalent to `/odds/{id}`
- `cappers()` - Equivalent to `/cappers` (learn more at [Cappers / Cappers](https://pnpbackend.docs.apiary.io/#/reference/cappers/cappers))
- `capper(id)` - Equivalent to `/cappers/{id}`
- `leaders()` - Equivalent to `/leaders` (learn more at [Cappers / Leaders](https://pnpbackend.docs.apiary.io/#/reference/cappers/leaders))
- `leader(id)` - Equivalent to `/leaders/{id}`
- `picks()` - Equivalent to `/picks` (learn more at [Cappers / Picks](https://pnpbackend.docs.apiary.io/#/reference/cappers/picks))
- `pick(id)` - Equivalent to `/picks/{id}`
- `packages()` - Equivalent to `/packages` (learn more at [Cappers / Packages](https://pnpbackend.docs.apiary.io/#/reference/cappers/packages))
- `package(id)` - Equivalent to `/packages/{id}`
- `subscriptions()` - Equivalent to `/subscriptions` (learn more at [Cappers / Subscriptions](https://pnpbackend.docs.apiary.io/#/reference/cappers/subscriptions))
- `subscription(id)` - Equivalent to `/subscriptions/{id}`
- `promoCode(id)` - Equivalent to `/promo-codes/{code}` (learn more at [Purchases / Promo Codes](https://pnpbackend.docs.apiary.io/#/reference/purchases/promo-codes))
- `countries()` - Equivalent to `/countries` (learn more at [Misc / Countries](https://pnpbackend.docs.apiary.io/#/reference/misc/countries))
- `country(id)` - Equivalent to `/countries/{id}`
- `states()` - Equivalent to `/states` (learn more at [Misc / States](https://pnpbackend.docs.apiary.io/#/reference/misc/states))
- `state(id)` - Equivalent to `/states/{id}`
