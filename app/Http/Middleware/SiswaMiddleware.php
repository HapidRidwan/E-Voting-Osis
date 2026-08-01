<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiswaMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        dd([
            'id' => auth()->user()->id,
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
        ]);

        if (auth()->check() && auth()->user()->role === 'siswa') {
            return $next($request);
        }

        abort(403);
    }
}