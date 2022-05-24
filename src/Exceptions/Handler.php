<?php

namespace Pnp\Sdk\Exceptions;

class Handler
{
    // 401
    public const INVALID_SITE_SECRET = 'INVALID_SITE_SECRET';
    public const USER_UNAUTHENTICATED = 'USER_UNAUTHENTICATED';
    // 403
    public const IP_NOT_ALLOWED = 'IP_NOT_ALLOWED';
    public const USER_SUSPENDED = 'USER_SUSPENDED';
    // 404
    public const NOT_FOUND = 'NOT_FOUND';
    // 422
    public const VALIDATION_ERROR = 'VALIDATION_ERROR';
    // 429
    public const TOO_MANY_REQUESTS = 'TOO_MANY_REQUESTS';
    // 500
    public const MAINTENANCE = 'MAINTENANCE';

    /**
     * Parse the correct specific request exception corresponding to the passed argument.
     *
     * @param  RequestException  $exception
     * @return RequestException
     */
    public static function parse(RequestException $exception): RequestException
    {
        $response = $exception->getResponse();

        switch ($exception->getErrorCode()) {
            case self::INVALID_SITE_SECRET:
                return new InvalidSiteSecretException($response);
            case self::USER_UNAUTHENTICATED:
                return new UserUnauthenticatedException($response);
            case self::IP_NOT_ALLOWED:
                return new IpNotAllowedException($response);
            case self::USER_SUSPENDED:
                return new UserSuspendedException($response);
            case self::NOT_FOUND:
                return new NotFoundException($response);
            case self::VALIDATION_ERROR:
                return new ValidationErrorException($response);
            case self::TOO_MANY_REQUESTS:
                return new TooManyRequestsException($response);
            case self::MAINTENANCE:
                return new MaintenanceException($response);
            default:
                return $exception;
        }
    }
}
