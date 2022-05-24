<?php

namespace Pnp\Sdk;

use RuntimeException;

class Resource
{
    /**
     * The resource properties (in snake_case).
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    private array $casts;


    /**
     * Make a resource from json.
     *
     * @param  array  $json
     * @param  string|null  $resourceClass
     * @return Resource
     */
    public static function parseFromJson(array $json, string $resourceClass = null): self
    {
        // If the json argument is passed with a data wrapper,
        // then we want to use the wrapped value.
        //
        // Ex:
        // {
        //      "data": { ... resource ... }
        // }
        if (isset($json['data']) && count($json) === 1) {
            $json = $json['data'];
        }

        $resourceClass ??= static::class;
        return new $resourceClass($json);
    }

    /**
     * Model constructor.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->casts = $this->getCasts();
        $this->fillFromJson($attributes);
    }

    /**
     * Fill the attributes from the array keys to model properties.
     *
     * @param  array  $attributes
     * @return Resource
     */
    public function fillFromJson(array $attributes = []): self
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $this->cast($key, $value));
        }

        return $this;
    }

    /**
     * Return the attributes of the resource.
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Return an attribute.
     *
     * @param  string  $name
     * @return mixed|null
     */
    public function getAttribute(string $name)
    {
        $name = Utility::strToSnake($name);
        return $this->attributes[$name] ?? null;
    }

    /**
     * Set the attribute by key.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return $this|Resource
     */
    public function setAttribute(string $name, $value): self
    {
        $name = Utility::strToSnake($name);
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * Return the casts for the resource.
     * Override this for each resource.
     *
     * @return array|string[]
     */
    public function getCasts(): array
    {
        return [];
    }

    /**
     * Cast an attribute to the target
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return mixed
     */
    protected function cast(string $name, $value)
    {
        if (is_null($value)) {
            return null;
        }

        $cast = $this->casts[$name] ?? null;

        if (is_null($cast)) {
            return $this->castWithMethod($name, $value);
        }

        switch ($cast) {
            case 'bool':
                return (bool) $value;
            case 'int':
                return (int) $value;
            case 'string':
                return (string) $value;
            case 'datetime':
                return Utility::strToDateTime($value);
            default:
                throw new RuntimeException("Cast [{$cast}] is not supported.");
        }
    }

    /**
     * Make the relation instance detected by the name, filled with the provided values.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return mixed|null
     */
    protected function castWithMethod(string $name, $value)
    {
        $name = Utility::strToCamel($name);
        $method = "cast{$name}";
        if (method_exists($this, $method)) {
            return $this->{$method}($value);
        }

        return $value;
    }

    /**
     * Return the resource attribute.
     *
     * @param $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->getAttribute($name);
    }

    /**
     * Set a resource attribute.
     *
     * @param  string  $name
     * @param  mixed  $value
     */
    public function __set(string $name, $value)
    {
        $this->setAttribute($name, $value);
    }

    /**
     * Return true if the property by name exists.
     *
     * @param $name
     * @return bool
     */
    public function __isset($name): bool
    {
        return array_key_exists(Utility::strToSnake($name), $this->attributes);
    }
}
