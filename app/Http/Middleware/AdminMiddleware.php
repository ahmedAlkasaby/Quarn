<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = auth()->guard('admin')->user();
        if($auth && $auth->active==1){
            return $next($request);
        }else{
            auth()->guard('admin')->logout();
            return redirect()->route('login.show')->with('error', __('auth.you_do_not_have_permission_to_access_this_page'));
        }
    }
}
