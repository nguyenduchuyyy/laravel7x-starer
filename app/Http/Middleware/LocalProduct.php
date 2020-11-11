<?php

namespace App\Http\Middleware;

use Closure;

class LocalProduct
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
        $canEdit = '';
        if ($canEdit == false) {
            return redirect('/');
        }
        return $next($request);
    }
}
