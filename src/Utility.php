<?php

namespace Pnp\Sdk;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Support\Str;

class Utility
{
    /**
     * The format of all timestamps.
     */
    public const TIMESTAMP_FORMAT = 'Y-m-d H:i:s';

    /**
     * Convert the string to "camelCase".
     *
     * @param  string  $value
     * @return string
     */
    public static function strToCamel(string $value): string
    {
        return Str::camel($value);
    }

    /**
     * Convert the string to "snake_case".
     *
     * @param  string  $value
     * @return string
     */
    public static function strToSnake(string $value): string
    {
        return Str::snake($value);
    }

    /**
     * Convert a string to date time.
     *
     * @param  string  $value
     * @return DateTimeInterface
     */
    public static function strToDateTime(string $value): DateTimeInterface
    {
        return Carbon::createFromFormat(static::TIMESTAMP_FORMAT, $value);
    }
}
