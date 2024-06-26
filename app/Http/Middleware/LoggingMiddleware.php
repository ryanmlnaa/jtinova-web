<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LoggingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user()->email;
        } else {
            $user = 'guest';
        }
        
        $tempPassword = '';
        if ($request->has('password')) {
            $tempPassword = $request->password;
            $request->merge(['password' => '***']);
        }

        Log::info('Request: ' . $request->fullUrl(), [
            'method' => $request->method(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'request' => $request->all(),
            'user' => $request->user() ? $request->user()->email : $user
        ]);

        if ($tempPassword != '') {
            $request->merge(['password' => $tempPassword]);
        }
        
        return $next($request);
    }
}
