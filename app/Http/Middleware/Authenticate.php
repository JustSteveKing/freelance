<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as BaseAuthenticate;
use Illuminate\Http\Request;

final class Authenticate extends BaseAuthenticate
{
    protected function redirectTo(Request $request): string
    {
        return route('oauth:login');
    }
}
