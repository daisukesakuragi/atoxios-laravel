<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpKernel\Exception\HttpException;

use Closure;

class MaintenanceCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->path() != 'healthcheck' && config('app.maintenance_mode') === true) {
            throw new HttpException(503, '');
        }
        return $next($request);
    }
}
