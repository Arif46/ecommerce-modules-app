<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'test-foster-fail',
        'test-foster-success',
        'test-foster-decline',
        'foster-payment-success',
        'foster-payment-decline',
        'foster-payment-fail',
        '/success','/cancel','/fail','/ipn'
    ];
}
