<?php

namespace App\Http\Middleware;

use App\Models\Doctor;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->email;
        $user = User::where('email', $user)->first();
        $doctor = Doctor::find($user->typeable_id);
        if ($doctor && $doctor->banned_at) {
            auth()->logout();
            return redirect()->route('login')->with('error', 'This account is banned.');
        }

        return $next($request);
    }
}
