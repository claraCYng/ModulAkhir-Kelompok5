<?php

namespace App\Http\Middleware;

use App\Models\Mahasiswa;
use Closure;

// Nur Fathiyyah - 215150700111048
class Authorization
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
        $token = $request->header('token') ?? $request->query('token');
        if (!$token) {
            return response()->json([
                'status' => 'Error',
                'message' => 'token not provided',
            ], 400);
        }
        $mahasiswa = Mahasiswa::where('token', $token)->first();
        if (!$mahasiswa) {
            return response()->json([
                'status' => 'Error',
                'message' => 'invalid token',
            ], 400);
        }
        $request->mahasiswa = $mahasiswa;
        return $next($request);
    }
}
