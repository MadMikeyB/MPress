<?php

class PageController extends BaseController
{
	public function __construct()
	{
		$menu = Menu::generateMenu();
		View::share('menu', $menu);
	}
	
	public function getMenu()
	{
		$menu = Menu::generateMenu();
		//$menu = '';
		return View::make('previewmenu')->with('menu', $menu);
	}

	public function processMenu()
	{
		$new_menu = array(
				'title'		=> Input::get('title'),
				'url'		=> Input::get('url'),
				'position'	=> Input::get('position')
		);
	
		$rules = array(
				'title' => 'required|min:3|max:128',
				'url' => 'required|min:3|max:128',
				'position' => 'required'
		);
	
		$v = Validator::make($new_menu, $rules);
		if ( $v->fails() )
		{
			return Redirect::to('admin/menu')->with('user', Auth::user())->with_errors($v)->with_input();
		}

		$menu = new Menu($new_menu);
		$menu->save();
	
		return Redirect::to('/admin/menu');
	}
	
	public function processMenuEdit( $id )
	{
		$menu = Menu::find($id);
		if ( $menu )
		{
			$data['title'] = Input::get('title');
			$data['url'] = Input::get('url');
			$data['position'] = Input::get('position');
			DB::table('menus')->where('id', $menu->id)->update( $data );	
			return Redirect::intended('/admin/menu');
		}
	}

	public function processMenuDelete( $id )
	{
		$menu = Menu::find( $id );
		if ( $menu )
		{
			$menu->delete();
			return Redirect::intended('/admin/menu');
		}
		else
		{
			return Redirect::back();
		}
	}
	
	public function processPage()
	{
		$new_page = array(
							'title'		=> Input::get('title'),
							'slug'		=> Input::get('slug'),
							'body'		=> Input::get('body'),
							'author_id'	=> Input::get('author_id')
					);

		$rules = array(
						'title' => 'required|min:3|max:128',
						'slug' => 'required|min:3|max:128',
						'body' => 'required'
				);

		$v = Validator::make($new_page, $rules);
		if ( $v->fails() )
		{
			return Redirect::to('admin/pages')->with('user', Auth::user())->with_errors($v)->with_input();
		}

		$page = new Page($new_page);
		$page->save();

		return Redirect::to($page->slug);
	}
	
	public function editPage( $slug )
	{
		$page = Page::findBySlug($slug);
		$user = Auth::user();
		
		if ( ! $page )
		{
			return App::abort(404);
		}
		
		if ( ! $user )
		{
			return App::abort(500);
		}
		
		return View::make('admineditpage')->with('page', $page)->with('user', $user);
	}
	
	public function processPageEdit( $slug )
	{
		if ( Auth::check() )
		{
			if ( $slug )
			{
				$page = Page::findBySlug($slug);
				
				if ( $page )
				{
					$data = array(
								'id'	=> $page->id,
								'title'	=> Input::get('title'),
								'slug'	=> Input::get('slug'),
								'body'	=> Input::get('body'),
							);
					
					$rules = array(
							'title' 	=> 'required|min:3|max:128',
							'slug'	=> 'required|min:3|max:128',
							'body'		=> 'required',
					);
					
					$v = Validator::make($data, $rules);
					
					if ( $v->fails() )
					{
						return Redirect::to('admin/pages')->with('user', Auth::user())->with_errors($v)->with_input();
					}
					
					Page::updatePage( $data );
						
					return Redirect::to( 'admin/pages/all' );
				}
				else
				{
					return App::abort(404);
				}
			}
		}
		else
		{
			return App::abort(500);
		}
	}
	
	public function deletePage($id)
	{
		if ( Auth::check() )
		{
			if ( $id )
			{
				$p = Page::findBySlug($id);
				$page = Page::find($p->id);
				if ( $page )
				{
					$page->delete();
					Notification::success('Page Deleted');
					return Redirect::to( '/admin/pages/all' );
				}
				else
				{
					return View::make('errorpage')->with('page', $id);
				}
			}
			else
			{
				return View::make('errorpage')->with('page', $id);
			}
		}
		else
		{
			return View::make('errorpage')->with('page', $id);
		}
	}
}