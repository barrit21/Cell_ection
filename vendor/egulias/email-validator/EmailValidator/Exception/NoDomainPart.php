<?php

/**
 * @file NoDomainPart.php
 */

namespace Egulias\EmailValidator\Exception;

class NoDomainPart extends InvalidEmail //automatically created by Laravel
{
    const CODE = 131;
    const REASON = "No Domain part";
}