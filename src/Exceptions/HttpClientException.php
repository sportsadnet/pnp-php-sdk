<?php

namespace Pnp\Sdk\Exceptions;

use RuntimeException;

/**
 * Class ClientException
 *
 * This is the generic exception thrown if anything gets
 * thrown by the HTTP client. The actual underlying
 * HTTP exception can be accessed via ->getPrevious().
 *
 * @package Pnp\Sdk\Exceptions
 */
class HttpClientException extends RuntimeException
{
    //
}
