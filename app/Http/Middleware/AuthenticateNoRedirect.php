<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use session;

class AuthenticateNoRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = session()->has('adminId');

        $agency = session()->has('AgencyId');
        // $driver=session()->has('DriverId');
        if ($admin) {
            return redirect()->back();
        }
        // if ($agency || $admin) {
        //     return redirect()->back();
        // }
        return $next($request);
    }
}
