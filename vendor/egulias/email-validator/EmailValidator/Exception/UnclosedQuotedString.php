<?php

/**
 * @file UnclosedQuotedString.php
 */

namespace Egulias\EmailValidator\Exception;

class UnclosedQuotedString extends InvalidEmail //automatically created by Laravel
{
    const CODE = 145;
    const REASON = "Unclosed quoted string";
}