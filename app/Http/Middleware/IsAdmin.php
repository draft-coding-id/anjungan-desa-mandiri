<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If bukan login sebagai warga atau belum login sebagia warga
        if (auth()->guard('warga')->check() == false) {
            response()->json(['message' => 'Unauthorized'], 401);
            return redirect()->route('login.warga');
        }
        return $next($request);
    }
}