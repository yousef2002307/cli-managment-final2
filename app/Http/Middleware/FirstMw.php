<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FirstMw
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('userid') ) {
            return redirect()->intended('/userhome');
        }
        if (session()->has('docid') ) {
            return redirect()->intended('/dochome');
        }
        if (session()->has('resid') ) {
            return redirect()->intended('/reshome');
        }
        if (session()->has('cliid') ) {
            return redirect()->intended('/clinichome');
        }
        if (session()->has('adminid') ) {
            return redirect()->intended('/adminhome');
        }
    
        return $next($request);
    }
}
