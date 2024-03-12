<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @method guard(string $string)
 */
class Authenticate extends Middleware
{

    protected function redirectTo(Request $request): JsonResponse
    {
//        return $request->expectsJson() ? null : route('login');
        return $request->expectsJson() ? response()->json(['error' => 'Unauthenticated'], 401) : abort(401, 'Unauthenticated');
    }

}
