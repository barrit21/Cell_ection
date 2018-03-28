<?php

/**
 * @file ConsecutiveAt.php
 */

namespace Egulias\EmailValidator\Exception;

class ConsecutiveAt extends InvalidEmail //automatically created by Laravel
{
    const CODE = 128;
    const REASON = "Consecutive AT";
}