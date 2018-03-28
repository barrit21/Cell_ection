<?php

/**
 * @file NoDNSRecord.php
 */

namespace Egulias\EmailValidator\Exception;

use Egulias\EmailValidator\Exception\InvalidEmail;

class NoDNSRecord extends InvalidEmail //automatically created by Laravel
{
    const CODE = 5;
    const REASON = 'No MX or A DSN record was found for this email';
}