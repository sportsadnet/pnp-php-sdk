<?php

namespace Pnp\Sdk\Cache;

use Pnp\Sdk\Http\Request;

class RequestChecksum
{
    /**
     * Make a request SHA1 checksum string.
     *
     * @param  Request  $request
     * @return string
     */
    public static function make(Request $request): string
    {
        return sha1(
            json_encode([
                $request->getHeaders(),
                $request->getUri(),
                $request->getMethod(),
                $request->getJson(),
                $request->getQuery(),
            ])
        );
    }
}
