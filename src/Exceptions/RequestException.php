<?php

namespace Pnp\Sdk\Exceptions;

use Pnp\Sdk\Http\Response;
use Throwable;

class RequestException extends HttpClientException
{
    /**
     * The response that accompanies the exception.
     *
     * @var Response|null
     */
    protected ?Response $response;

    /**
     * The response JSON data.
     *
     * @var array
     */
    protected array $responseData = [];

    /**
     * The error code returned in the response.
     *
     * @var string|null
     */
    protected ?string $errorCode;

    /**
     * The error message returned in the response.
     *
     * @var string|null
     */
    protected ?string $errorMessage;

    /**
     * RequestException constructor.
     *
     * @param  Response|null  $response
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable|null  $previous
     */
    public function __construct(Response $response = null, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->response = $response;

        if ($response !== null) {
            $this->responseData = json_decode($response->body(), true) ?? [];
        } else {
            $this->responseData = [];
        }

        $this->errorCode = $this->responseData['code'] ?? null;
        $this->errorMessage = $this->responseData['message'] ?? null;

        $message = join(' ', [$message, "[Status {$this->getStatus()}, Code: {$this->getErrorCode()}, Message: {$this->getErrorMessage()}]"]);

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the response of the request.
     *
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * Return the response status.
     *
     * @return int
     */
    public function getStatus(): ?int
    {
        if ($this->response == null) {
            return null;
        }

        return $this->response->status();
    }

    /**
     * Return the response error code.
     *
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * Return the response error message.
     *
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }
}
