<?php

/**
 * @file NoLocalPart.php
 */

namespace Egulias\EmailValidator\Exception;

class NoLocalPart extends InvalidEmail //automatically created by Laravel
{
    const CODE = 130;
    const REASON = "No local part";
}