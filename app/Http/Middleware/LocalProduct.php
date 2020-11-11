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
    public function handle($request, Closure $next, $localproduct)
    {
        // $canEdit = '';
        // if ($canEdit == false) {
        //     return redirect('/');
        // }

        // $user = $request->user();

        // if (empty($user) ) {
        //     return redirect('/');
        // } else {
        //     if(! $user->hasRole('admin')){
        //         return redirect('/');
        //     }
        // }
        return $next($request);
    }
}
