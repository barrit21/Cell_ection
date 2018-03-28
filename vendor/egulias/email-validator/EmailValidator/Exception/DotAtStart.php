<?php

/**
 * @file DotAtStart.php
 */

namespace Egulias\EmailValidator\Exception;

class DotAtStart extends InvalidEmail //automatically created by Laravel
{
    const CODE = 141;
    const REASON = "Found DOT at start";
}