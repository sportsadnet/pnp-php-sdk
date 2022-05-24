<?php

namespace Pnp\Sdk\Http;

class Request
{
    /**
     * The request method (GET, POST etc).
     *
     * @var string
     */
    private string $method;

    /**
     * The request url (with no query data).
     *
     * @var string
     */
    private string $uri;

    /**
     * The request headers.
     *
     * @var array|string[]
     */
    private array $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];

    /**
     * The query data.
     *
     * @var array
     */
    private array $query = [];

    /**
     * Json data if attached.
     *
     * @var array
     */
    private array $json = [];

    /**
     * Request constructor.
     *
     * @param  string  $method
     * @param  string  $uri
     */
    public function __construct(string $method, string $uri)
    {
        $this->setMethod($method)
            ->setUri($uri);
    }

    /**
     * Return the request URI.
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Set the URI of the request.
     *
     * @param  string  $uri
     * @return $this
     */
    private function setUri(string $uri): self
    {
        // TODO: Perform more validation.

        $this->uri = $uri;
        return $this;
    }

    /**
     * Return the request method.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Set the method of the request.
     *
     * @param  string  $method
     * @return $this
     */
    private function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Return the headers of the request.
     *
     * @return array|string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Return a specific header.
     *
     * @param  string  $header
     * @return string
     */
    public function getHeader(string $header): string
    {
        return (string) $this->headers[$header];
    }

    /**
     * Set the headers of the request.
     *
     * @param  array  $headers
     * @return $this
     */
    public function setHeaders(array $headers = []): self
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Merge the current headers with the provided ones.
     *
     * @param  array  $headers
     * @return $this
     */
    public function mergeHeaders(array $headers = []): self
    {
        $this->headers = array_merge($this->headers, $headers);
        return $this;
    }

    /**
     * Set a specific header.
     *
     * @param  string  $header
     * @param  string  $value
     * @return Request
     */
    public function setHeader(string $header, string $value): self
    {
        $this->headers[$header] = $value;
        return $this;
    }

    /**
     * Return the request JSON.
     *
     * @return array
     */
    public function getJson(): array
    {
        return $this->json;
    }

    /**
     * Set the json of the request.
     *
     * @param  array  $json
     * @return $this
     */
    public function setJson(array $json = []): self
    {
        $this->json = $json;
        return $this;
    }

    /**
     * Return the query values of the request.
     *
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * Set the query values of the request.
     *
     * @param  array  $values
     * @return $this
     */
    public function setQuery(array $values = []): self
    {
        $this->query = $values;
        return $this;
    }

    /**
     * Merge the current query values with the provided ones.
     *
     * @param  array  $values
     * @return $this
     */
    public function mergeQuery(array $values = []): self
    {
        $this->query = array_merge($this->query, $values);
        return $this;
    }

    /**
     * Add a query value.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return $this
     */
    public function addQuery(string $name, $value): self
    {
        $this->query[$name] = $value;
        return $this;
    }
}
