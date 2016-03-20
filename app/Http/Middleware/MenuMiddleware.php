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
            foreach ( \App\Menu::generateMenu() as $item ) 
            {
                // If menu item is public, add it
                if ( $item->group == '3' )
                {
                    $menu->add($item->title, $item->url);
                }
                else
                {
                    // otherwise, check user is authed
                    if ( Auth::check() )
                    {
                        // then check if they have permission to see the item
                        if ( Auth::user()->group <= $item->group )
                        {
                            // then add it to menu
                            $menu->add($item->title, $item->url);
                        }
                    }
                }
            }
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
            $menu->add('Home', '')->prepend('<i class="fa fa-home"></i><span>')->prepend('</span>');
            $menu->add('Dashboard', 'admin')->prepend('<i class="fa fa-dashboard"></i><span>')->prepend('</span>');
            $menu->add('Settings', 'admin/settings')->prepend('<i class="fa fa-cogs"></i><span>')->prepend('</span>');
            $menu->add('Users', 'admin/users')->prepend('<i class="fa fa-users"></i><span>')->prepend('</span>');
            $menu->add('Menus', 'admin/menus')->prepend('<i class="fa fa-th"></i><span>')->prepend('</span>');
            $menu->add('Posts', 'admin/posts')->prepend('<i class="fa fa-pencil-square-o"></i><span>')->prepend('</span>');
            $menu->add('Pages', 'admin/pages')->prepend('<i class="fa fa-file-o"></i><span>')->prepend('</span>');
            $menu->add('Comments', 'admin/comments')->prepend('<i class="fa fa-comments"></i><span>')->prepend('</span>');
            $menu->add('Tools', 'admin/tools')->prepend('<i class="fa fa-wrench"></i><span>')->prepend('</span>');
            $menu->add('Log Out', 'logout')->prepend('<i class="fa fa-sign-out"></i><span>')->prepend('</span>');
        });

        return $next($request);
    }
}
