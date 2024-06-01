<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use session;
class PassengerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    	$passengerlogin=session()->has('PassengerId');
    	// dd($passengerlogin);
    	if(!$passengerlogin)
    	{
    		return redirect('/login');    	
    	}
        return $next($request);

    }
}
