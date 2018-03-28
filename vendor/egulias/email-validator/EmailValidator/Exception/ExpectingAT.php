<?php

/**
 * @file ExpectingAT.php
 */

namespace Egulias\EmailValidator\Exception;

class ExpectingAT extends InvalidEmail //automatically created by Laravel
{
    const CODE = 202;
    const REASON = "Expecting AT '@' ";
}