<?php

/**
 * @file InvalidEmail.php
 */

namespace Egulias\EmailValidator\Exception;

abstract class InvalidEmail extends \InvalidArgumentException //automatically created by Laravel
{
    const REASON = "Invalid email";
    const CODE = 0;

    public function __construct()
    {
        parent::__construct(static::REASON, static::CODE);
    }
}