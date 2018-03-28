<?php

/**
 * @file ExpectinDomainLiteralClose.php
 */

namespace Egulias\EmailValidator\Exception;

class ExpectingDomainLiteralClose extends InvalidEmail //automatically created by Laravel
{
    const CODE = 137;
    const REASON = "Closing bracket ']' for domain literal not found";
}