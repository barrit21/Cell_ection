<?php

/**
 * @file CRNoLF.php
 */

namespace Egulias\EmailValidator\Exception;

class CRNoLF extends InvalidEmail //automatically created by Laravel
{
    const CODE = 150;
    const REASON = "Missing LF after CR";
}