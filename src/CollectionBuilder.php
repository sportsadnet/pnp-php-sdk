<?php

/** @noinspection PhpUnused */

namespace Pnp\Sdk;

use DateTimeInterface;
use Pnp\Sdk\Cache\CacheableBuilder;
use Pnp\Sdk\Cache\CacheableCollectionBuilder;
use Pnp\Sdk\Http\Request;
use Pnp\Sdk\Promises\PromisedCollection;
use Pnp\Sdk\Promises\PromisedResource;
use Pnp\Sdk\Resource as ApiResource;

class CollectionBuilder extends Builder
{
    /**
     * Maximum items allowed by the API per page.
     */
    public const MAX_PER_PAGE = 1000;

    /**
     * Ascending ordering.
     */
    public const ORDERING_ASC = 'asc';

    /**
     * Descending ordering.
     */
    public const ORDERING_DESC = 'desc';

    /**
     * The applied filters to the request.
     *
     * @var array
     */
    private array $filters = [];

    /**
     * The ordering rule of the query.
     *
     * @var string|null
     */
    private ?string $orderBy = null;

    /**
     * The ordering direction of items ("asc" or "desc").
     *
     * @var string|null
     */
    private ?string $orderDir = null;

    /**
     * The requested page.
     *
     * @var int|null
     */
    private ?int $page = null;

    /**
     * How many items should be returned per page.
     *
     * @var int|null
     */
    private ?int $perPage = null;

    /**
     * Adds a filter to the query.
     *
     * @param  string  $filter
     * @param  string  $operator
     * @param  mixed  $value
     * @return CollectionBuilder
     */
    public function where(string $filter, string $operator, $value): self
    {
        $filter = Utility::strToSnake($filter);

        $key = "{$filter}({$operator})";
        $value = $this->valueToFilterString($value);

        $this->filters[$key] = $value;
        return $this;
    }

    /**
     * Convert a value to a string.
     *
     * @param  mixed  $value
     * @return string
     */
    public function valueToFilterString($value): string
    {
        if (is_string($value)) {
            return $value;
        }

        if (is_array($value)) {
            return implode(',', $value);
        }

        if (is_bool($value)) {
            return $value ? 1 : 0;
        }

        if ($value === null) {
            return '';
        }

        if ($value instanceof DateTimeInterface) {
            return $value->format(Utility::TIMESTAMP_FORMAT);
        }

        return (string) $value;
    }

    /**
     * Order by rule.
     *
     * @param  string  $rule
     * @param  string  $direction
     * @return CollectionBuilder
     */
    public function orderBy(string $rule, string $direction = self::ORDERING_ASC): self
    {
        $this->orderBy = Utility::strToSnake($rule);
        $this->orderDir = $direction;
        return $this;
    }

    /**
     * Order by rule in descending order.
     *
     * @param  string  $rule
     * @return CollectionBuilder
     */
    public function orderByDesc(string $rule): self
    {
        return $this->orderBy($rule, self::ORDERING_DESC);
    }

    /**
     * Set the page of the request.
     *
     * @param  int  $page
     * @return CollectionBuilder
     */
    public function page(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Set how many items should be returned per request.
     *
     * @param  int  $perPage
     * @return CollectionBuilder
     */
    public function perPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function cache(?int $lifetime = CacheableBuilder::DEFAULT_LIFETIME, ?string $key = null): CacheableCollectionBuilder
    {
        return (new CacheableCollectionBuilder($this->getCacheDriver(), $this))
            ->withLifetime($lifetime)
            ->withKey($key);
    }

    /**
     * Build the request for retrieving (getting) the resources.
     *
     * @return Request
     */
    public function buildGetRequest(): Request
    {
        $request = $this->buildBaseRequest('GET');

        // Append all query filters.
        if (! empty($this->filters)) {
            $request->mergeQuery($this->filters);
        }

        // Append ordering rules if assigned.
        if ($this->orderBy !== null) {
            $request->addQuery('order_by', $this->orderBy);
        }
        if ($this->orderDir !== null) {
            $request->addQuery('order_dir', $this->orderDir);
        }

        // Append pagination info if assigned.
        if ($this->page !== null) {
            $request->addQuery('page', $this->page);
        }
        if ($this->perPage !== null) {
            $request->addQuery('per_page', $this->perPage);
        }

        return $request;
    }

    /**
     * Build the request for creating a new resource with the provided attributes.
     *
     * @param  array  $attributes
     * @return Request
     */
    public function buildCreateRequest(array $attributes = []): Request
    {
        return $this->buildBaseRequest('POST')->setJson($attributes);
    }

    /**
     * Return the results as collection.
     *
     * @return array
     */
    public function get(): array
    {
        return $this->getAsync()->get();
    }

    /**
     * Return the results as paginator.
     *
     * @return Paginator
     */
    public function paginate(): Paginator
    {
        return $this->getAsync()->paginate();
    }

    /**
     * Return the first resource of the result.
     *
     * @return ApiResource|null
     */
    public function first(): ?ApiResource
    {
        return $this->get()[0] ?? null;
    }

    /**
     * Send the request asynchronously.
     *
     * @return PromisedCollection
     */
    public function getAsync(): PromisedCollection
    {
        return new PromisedCollection(
            $this->sendRequest($this->buildGetRequest()),
            $this->resourceClass
        );
    }

    /**
     * Create a resource with the provided attributes.
     *
     * @param  array  $attributes
     * @return ApiResource|null
     */
    public function create(array $attributes = []): ?ApiResource
    {
        return $this->createAsync($attributes)->get();
    }

    /**
     * Create a resource asynchronously.
     *
     * @param  array  $attributes
     * @return PromisedResource
     */
    public function createAsync(array $attributes = []): PromisedResource
    {
        return new PromisedResource(
            $this->sendRequest($this->buildCreateRequest($attributes)),
            $this->resourceClass
        );
    }

    // --------------------------------------------------------------------------

    // These overrides help IDE-s to auto complete better.

    /**
     * {@inheritDoc}
     */
    public function auth(string $token = null): self
    {
        return parent::auth($token);
    }

    /**
     * {@inheritDoc}
     */
    public function with(array $relations = []): self
    {
        return parent::with($relations);
    }
}
