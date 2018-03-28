<?php

/**
 * @file CommainDomain.php
 */

namespace Egulias\EmailValidator\Exception;

class CommaInDomain extends InvalidEmail //automatically created by Laravel
{
    const CODE = 200;
    const REASON = "Comma ',' is not allowed in domain part";
}