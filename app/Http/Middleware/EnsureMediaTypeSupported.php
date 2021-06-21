<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\UnsupportedMediaType;

class EnsureMediaTypeSupported
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @throws \App\Exceptions\UnsupportedMediaType
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->headers->get('Content-Type') !== 'application/json') {
            throw new UnsupportedMediaType('Only support JSON media type');
        }

        return $next($request);
    }
}
