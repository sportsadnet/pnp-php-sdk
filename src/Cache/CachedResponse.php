<?php

namespace Pnp\Sdk\Cache;

use Pnp\Sdk\Http\Response;

class CachedResponse extends Response
{
    /**
     * Create a new cached response from a normal response.
     *
     * @param  Response  $response
     * @return CachedResponse
     */
    public static function fromResponse(Response $response): CachedResponse
    {
        return new CachedResponse(
            $response->headers(),
            $response->body(),
            $response->status()
        );
    }

    /**
     * Create a cached response from packed json string.
     *
     * @param  string  $jsonString
     * @return CachedResponse
     */
    public static function fromJson(string $jsonString): CachedResponse
    {
        $json = json_decode($jsonString, true);
        return new CachedResponse($json['headers'], $json['body'], $json['status']);
    }

    /**
     * Pack the response into a json string.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode([
            'headers' => $this->headers(),
            'body' => $this->body(),
            'status' => $this->status(),
        ]);
    }
}
