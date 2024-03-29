<?php

namespace App\Exceptions;

class CheckPasswordException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return BusinessLogicException::PASSWORD_CONFIRMATION;
    }

    public function getStatusMessage(): string
    {
        return __('errors.check_password');
    }
}
