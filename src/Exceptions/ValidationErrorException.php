<?php

namespace Pnp\Sdk\Exceptions;

use Pnp\Sdk\Http\Response;
use Throwable;

/**
 * Exception thrown in response to status 422 with error code "VALIDATION_ERROR".
 */
class ValidationErrorException extends RequestException
{
    /**
     * The validation errors.
     *
     * @var array
     */
    protected array $errors;

    /**
     * ValidationErrorException constructor.
     *
     * @param  Response|null  $response
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable|null  $previous
     */
    public function __construct(Response $response = null, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($response, $message, $code, $previous);
        $this->errors = $this->responseData['errors'] ?? [];
    }

    /**
     * Return the validation errors.
     *
     * @return array
     */
    public function getValidationErrors(): array
    {
        return $this->errors;
    }
}
