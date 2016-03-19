<?php 
namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware {

    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }
        else
        {
            if ( Auth::check() )
            {
                return redirect()->back()->with('flash_message', 'You are not authorised to view this page!');
            }
            else
            {
                return redirect()->guest('login');
            }
        }
    }

}