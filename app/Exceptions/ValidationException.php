<?php

namespace App\Exceptions;

class ValidationException extends \Exception
{
    public function __construct(string $messege){
        parent::__construct($messege);
    }
}