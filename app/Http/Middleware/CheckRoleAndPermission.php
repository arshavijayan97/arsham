<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoleAndPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next, ...$rolesAndPermissions)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $user = Auth::user();
        foreach ($rolesAndPermissions as $roleOrPermission) {
            if ($user->hasRole($roleOrPermission) || $user->can($roleOrPermission)) {
                return $next($request);
            }
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
