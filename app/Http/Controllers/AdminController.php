<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Theme;
use View;
use Storage;

use App\Post;
use App\Page;
use App\Comment;
use App\User;
use App\Image;
use App\Menu;
use App\UserGroup;
use App\Setting;

class AdminController extends Controller
{
	public function __construct()
	{
		// Admin Theme for Admin Controller
		Theme::init('AdminLTE');

        // Set the menu
        $menu = Menu::generateMenu();
        View::share('menu', $menu);
	}
    
    public function validator(Request $request)
    {
        $this->validate($request, [
               'title'      => 'required|min:4|max:140',
               'content'    => 'required',
         ]);
    }
    
	// Dashboard
    public function index() 
    {
    	return view('admin.index');
    }

    public function menus()
    {
    	return view('admin.menu.index');
    }

    public function storeMenu(Request $request)
    {
        $menu = new Menu($request->all());
        $menu->save();

        session()->flash('flash_message', 'Menu Item Added!');

        return back();
    }

    public function posts()
    {
        $posts = Post::withTrashed()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function pages()
    {
        $pages = Page::withTrashed()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function users()
    {
        $users = User::withTrashed()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function settings()
    {
        $settings = Setting::all();
        $themes = Storage::disk('resources')->directories('themes');
        return view('admin.settings.index', compact('settings', 'themes'));
    }

    public function storeSettings(Request $request)
    {
        foreach ($request->input() as $key => $value) {
            Setting::set($key, $value);
        }

        return back();
    }

    /**
     * Create the Page
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function createPage()
    {
        return view('admin.pages.create');
    }

    /**
     * Store the Page
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function storePage(Request $request)
    {        
        $this->validator($request);

        $page = new Page($request->all());
        $page->author_id = $request->user()->id;

        $page->save();

        session()->flash('flash_message', 'Congrats! Page created.');

        return redirect('/' . $page->slug );
    }

}
