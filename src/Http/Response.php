<?php

namespace Pnp\Sdk\Http;

use Pnp\Sdk\Exceptions\Handler;
use Pnp\Sdk\Exceptions\RequestException;

class Response
{
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_UNPROCESSABLE_ENTITY = 422;
    public const HTTP_TOO_MANY_REQUESTS = 429;
    public const HTTP_SERVER_ERROR = 500;
    public const HTTP_SERVICE_UNAVAILABLE = 503;

    /**
     * The response headers.
     *
     * @var array
     */
    private array $headers;

    /**
     * The body of the response.
     *
     * @var string
     */
    private string $body;

    /**
     * The status of the response.
     *
     * @var int
     */
    private int $status;

    /**
     * Response constructor.
     *
     * @param  array  $headers
     * @param  string  $body
     * @param  int  $status
     */
    public function __construct(array $headers, string $body, int $status)
    {
        $this->headers = $headers;
        $this->body = $body;
        $this->status = $status;
    }

    /**
     * Return the headers of the response.
     *
     * @return array
     */
    public function headers(): array
    {
        return $this->headers;
    }

    /**
     * Return the body of the response.
     *
     * @return string
     */
    public function body(): string
    {
        return $this->body;
    }

    /**
     * Return the status of the response.
     *
     * @return int
     */
    public function status(): int
    {
        return $this->status;
    }

    /**
     * Throw the corresponding exception by response status.
     *
     * @return $this
     */
    public function throwExceptionsIfAny(): self
    {
        if ($this->status < 400) {
            return $this;
        }

        $exception = new RequestException($this, "Request failed.");
        throw Handler::parse($exception);
    }
}
