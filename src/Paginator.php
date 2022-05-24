<?php

namespace Pnp\Sdk;

class Paginator
{
    /**
     * The items.
     *
     * @var array
     */
    private array $items;

    /**
     * The total amount of items.
     *
     * @var int
     */
    private int $total;

    /**
     * How many items are returned per page.
     *
     * @var int
     */
    private int $perPage;

    /**
     * The current page.
     *
     * @var int
     */
    private int $currentPage;

    /**
     * Make a paginator from json response. The json must include "data" and "meta" root keys.
     *
     * @param  array  $json
     * @param  string|null  $resourceClass
     * @return Paginator
     */
    public static function parseFromJson(array $json, string $resourceClass = null): Paginator
    {
        $resourceClass ??= Resource::class;

        $items = array_map(function ($item) use ($resourceClass) {
            return Resource::parseFromJson($item, $resourceClass);
        }, $json['data']);

        if (isset($json['meta'])) {
            $page = $json['meta']['current_page'];
            $perPage = $json['meta']['per_page'];
            $total = $json['meta']['total'];
        } else {
            $page = 1;
            $total = count($items);
            $perPage = $total > 0 ?: 1;
        }

        return new Paginator($items, $total, $perPage, $page);
    }

    /**
     * Paginator constructor.
     *
     * @param  array  $items
     * @param  int  $total
     * @param  int  $perPage
     * @param  int  $currentPage
     */
    public function __construct(array $items, int $total, int $perPage, int $currentPage)
    {
        $this->items = $items;
        $this->total = $total;
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;
    }

    /**
     * Return the items array itself.
     *
     * @return array
     */
    public function items(): array
    {
        return $this->items;
    }

    /**
     * Return the total amount of items.
     *
     * @return int
     */
    public function total(): int
    {
        return $this->total;
    }

    /**
     * Return the item count per page.
     *
     * @return int
     */
    public function perPage(): int
    {
        return $this->perPage;
    }

    /**
     * Return the current page.
     *
     * @return int
     */
    public function currentPage(): int
    {
        return $this->currentPage;
    }
}
