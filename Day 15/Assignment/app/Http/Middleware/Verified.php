<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Verified
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
            return $next($request);
        }
        
        return redirect('email/verify')
            ->with('error', 'You need to verify your email address to access this page.');
    }
}