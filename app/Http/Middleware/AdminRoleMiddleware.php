<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Http\Helpers\alerts;
use App\Models\Role;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if( ! $request->user()->is_admin )
      {
        return redirect('/home')->with(alerts::flash_message('/home', 'danger', 'You do not have enough permissions to access this area.'));
      }

        return $next($request);
    }
}
