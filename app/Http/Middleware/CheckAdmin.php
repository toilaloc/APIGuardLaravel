<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckAdmin
{
    CONST ADMIN_ROLE_ID = 1;
    CONST ADMIN_ORG_ROLE_ID = 2;
    CONST WRITER_ROLE_ID = 3;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('api')->user()) {
            $roleCurrentUser = Auth::guard('api')->user()->roles->first()->role_id;
            if ($roleCurrentUser === self::ADMIN_ROLE_ID || $roleCurrentUser === self::ADMIN_ORG_ROLE_ID)
            {
                return $next($request);
            }
        }
        return response()->json('Unauthorized', 413);

    }
}
