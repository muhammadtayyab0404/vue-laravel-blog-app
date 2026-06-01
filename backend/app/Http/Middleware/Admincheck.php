<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admincheck
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        

        if ($user->roles && $user->roles->slug === 'admin'){
            
            return $next($request);

        }else{
            return response()->json([
        'message' => 'Unauthorized'
    ], 403);
        }
        

        
    }
}
