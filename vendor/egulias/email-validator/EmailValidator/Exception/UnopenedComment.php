<?php

/**
 * @file UnopenedComment.php
 */

namespace Egulias\EmailValidator\Exception;

class UnopenedComment extends InvalidEmail //automatically created by Laravel
{
    const CODE = 152;
    const REASON = "No opening comment token found";
}