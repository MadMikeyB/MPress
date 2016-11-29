<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

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

    use SEOToolsTrait;

	public function __construct()
	{
		// Admin Theme for Admin Controller
		Theme::init('AdminLTE');

        // Set the menu
        $menu = Menu::generateMenu();
        View::share('menu', $menu);

        $this->seo()->setTitle( 'Admin &mdash;' . Setting::get('site_title') );
        $this->seo()->setDescription(  Setting::get('site_description') );
        $this->seo()->opengraph()->setUrl( app()->make('url')->to('/') );
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite( Setting::get('social_twitter') );
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
        $this->seo()->setTitle( 'Dashboard &mdash; ' . $this->seo()->getTitle() );

    	return view('admin.index');
    }

    public function menus()
    {
        $this->seo()->setTitle( 'Menu Manager &mdash; ' . $this->seo()->getTitle() );

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
        $this->seo()->setTitle( 'Post Manager &mdash; ' . $this->seo()->getTitle() );
        $posts = Post::withTrashed()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function pages()
    {
        $this->seo()->setTitle( 'Page Manager &mdash; ' . $this->seo()->getTitle() );
        $pages = Page::withTrashed()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function users()
    {
        $this->seo()->setTitle( 'User Manager &mdash; ' . $this->seo()->getTitle() );
        $users = User::withTrashed()->paginate(10);
        return view('admin.users.index', compact('users'));
    }


    public function comments()
    {
        $this->seo()->setTitle( 'Comment Manager &mdash; ' . $this->seo()->getTitle() );
        $comments = Comment::withTrashed()->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    public function settings()
    {
        $this->seo()->setTitle( 'Settings Manager &mdash; ' . $this->seo()->getTitle() );
        $settings = Setting::all();
        $themes = Storage::disk('resources')->directories('themes');
        $pages = Page::all();
        return view('admin.settings.index', compact('settings', 'themes', 'pages'));
    }

    public function editor( $theme = null)
    {
        $this->seo()->setTitle( 'Theme Editor &mdash; ' . $this->seo()->getTitle() );

        $themes = Storage::disk('resources')->directories('themes');
        
        if ( $theme )
        {
            $files = Storage::disk('resources')->allFiles( 'themes/' . $theme );

            return view('admin.editor.editor', compact('files', 'theme'));
        }

        return view('admin.editor.themes', compact('themes'));

    }

    public function editFile( $path )
    {
        $path = base_path() . '/resources/' . $path;

        if ( file_exists( $path ) )
        {

            $return = file_get_contents($path);
            $return = htmlentities($return);
            return $return;
        }
        else
        {
            throw new \ErrorException('No file found');
        }
    }

    public function storeSettings(Request $request)
    {
        foreach ($request->input() as $key => $value) 
        {
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
        $this->seo()->setTitle( 'New Page &mdash; ' . $this->seo()->getTitle() );

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

    /**
     * Create the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function createPost()
    {
        $this->seo()->setTitle( 'New Post &mdash; ' . $this->seo()->getTitle() );

        return view('admin.posts.create');
    }

    /**
     * Store the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function storePost(Request $request)
    {        
        $this->validator($request);

        $post = new Post($request->all());
        $post->author_id = $request->user()->id;
        
        if ( $request->has('draft') )
        {
            $post->status = 'draft';
        }
        else
        {
            $post->status = 'publish';
        }

        if ( $request->has('category') )
        {
            $post->category_id = $request->category;
        }
        else
        {
            $post->category_id = '1';
        }

        $post->save();

        session()->flash('flash_message', 'Congrats! Post Created');

        return redirect('/read/' . $post->slug );
    }

}
