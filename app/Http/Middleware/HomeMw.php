<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Receptionist;
use App\Models\Appoiment;
use  App\Models\Patient;
use App\Mail\HelloMail;
class HomeMw
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('userid') ) {
            return redirect()->intended('/');
        }
        $patient = Patient::find(session('userid'));
        if($patient->pending){
            return redirect()->intended('/pending11');
          }
        if(!$patient->name){
          return redirect()->intended('/useredit3');
        }
    
        return $next($request);
    }
}
