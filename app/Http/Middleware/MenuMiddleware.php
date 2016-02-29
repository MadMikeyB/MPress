<?php

namespace App\Http\Middleware;

use Menu;
use Auth;
use Closure;

class MenuMiddleware
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
        Menu::make('MainNavigation', function($menu) 
        {
            // @todo move to call from a Menus Table and foreach through for results.
            // Something like.. 
            // foreach ( $item as Menu::all() ) {
            //     $menu->add($item->name, $item->url);
            // }
            $menu->add('Home');
            $menu->add('About', 'about');
            $menu->add('Archives', 'posts');
            $menu->add('Contact',  'contact');
        });

        Menu::make('UserNavigation', function($menu) 
        {
            if ( ! Auth::check() )
            {
                $menu->add('Log In',  'login');
                $menu->add('Register',  'register');
            }
            else
            {
                $menu->add(Auth::user()->name, 'author/' . Auth::user()->id)->add('Dashboard', 'dashboard');
                $menu->add('Log Out', 'logout');
            }
        });

        return $next($request);
    }
}
