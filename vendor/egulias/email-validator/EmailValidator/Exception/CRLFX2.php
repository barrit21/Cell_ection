<?php

/**
 * @file CRLFX2.php
 */

namespace Egulias\EmailValidator\Exception;

class CRLFX2 extends InvalidEmail //automatically created by Laravel
{
    const CODE = 148;
    const REASON = "Folding whitespace CR LF found twice";
}