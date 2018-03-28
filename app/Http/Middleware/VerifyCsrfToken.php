<?php

/**
 * @file VerifyCsrfToken.php
 */

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

/**
 * @class VerifyCsrfToken
 */
class VerifyCsrfToken extends Middleware //automatically created by Laravel
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}