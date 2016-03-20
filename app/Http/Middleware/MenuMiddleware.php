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
            $menu->add('Posts', 'posts');
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
                $menu->add(Auth::user()->name, '@' . Auth::user()->slug)->nickname('usermenu');
                $menu->add('Dashboard', ['url' => 'dashboard', 'parent' => $menu->usermenu->id]);
                if ( Auth::user()->isAdmin() )
                {
                    $menu->add('Admin', ['url' => 'admin', 'parent' => $menu->usermenu->id]);
                }
                $menu->add('Log Out', 'logout');
            }
        });

        Menu::make('AdminNavigation', function($menu)
        {
            $menu->add('Home')->prepend('<i class="fa fa-home"></i><span>')->prepend('</span>');
            $menu->add('Dashboard')->prepend('<i class="fa fa-dashboard"></i><span>')->prepend('</span>');
            $menu->add('Settings')->prepend('<i class="fa fa-cogs"></i><span>')->prepend('</span>');
            $menu->add('Users')->prepend('<i class="fa fa-users"></i><span>')->prepend('</span>');
            $menu->add('Menus')->prepend('<i class="fa fa-th"></i><span>')->prepend('</span>');
            $menu->add('Posts')->prepend('<i class="fa fa-pencil-square-o"></i><span>')->prepend('</span>');
            $menu->add('Pages')->prepend('<i class="fa fa-file-o"></i><span>')->prepend('</span>');
            $menu->add('Comments')->prepend('<i class="fa fa-comments"></i><span>')->prepend('</span>');
            $menu->add('Tools')->prepend('<i class="fa fa-wrench"></i><span>')->prepend('</span>');
            $menu->add('Log Out')->prepend('<i class="fa fa-sign-out"></i><span>')->prepend('</span>');
        });

        return $next($request);
    }
}
