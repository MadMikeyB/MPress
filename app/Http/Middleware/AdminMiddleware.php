<?php 
namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware {

    public function handle($request, Closure $next)
    {
        if( Auth::check() && Auth::user()->is_admin)
        {
            return $next($request);
            
        } else {

            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('auth/login');
            }
        }

    }

}