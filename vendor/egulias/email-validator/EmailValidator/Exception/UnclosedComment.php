<?php

/**
 * @file UnclosedComment.php
 */

namespace Egulias\EmailValidator\Exception;

class UnclosedComment extends InvalidEmail //automatically created by Laravel
{
    const CODE = 146;
    const REASON = "No colosing comment token found";
}