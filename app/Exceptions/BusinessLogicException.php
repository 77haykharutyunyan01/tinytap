<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

abstract class BusinessLogicException extends Exception
{
    const VALIDATION_FAILED = 600;
    const SAVING_ERROR = 601;
    const USER_NOT_FOUND = 602;
    const PASSWORD_CONFIRMATION = 603;

    private int $httpStatusCode = ResponseAlias::HTTP_BAD_REQUEST;

    abstract public function getStatus(): int;

    abstract public function getStatusMessage(): string;

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }
}
