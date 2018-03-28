<?php

/**
 * @file DomainHpyhened.php
 */

namespace Egulias\EmailValidator\Exception;

class DomainHyphened extends InvalidEmail //automatically created by Laravel
{
    const CODE = 144;
    const REASON = "Hyphen found in domain";
}