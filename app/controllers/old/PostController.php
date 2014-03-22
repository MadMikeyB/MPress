<?php

class PostController extends BaseController
{
	public function index()
	{
		$data = array();
		// for sidebar
		$posts = DB::table('posts')->orderBy('created_at', 'desc')->take(15)->get();
		// for main
		$post = Post::find(Post::findLatest());
		return View::make('allposts', array('posts' => $posts, 'post' => $post));
	}
	
	public function showArchives()
	{
		$posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
		return View::make('archives', array('posts' => $posts));
	}
	
	public function showPost( $post ) 
	{
		$post = Post::findBySlug( $post );
		
		if ( !$post )
		{
			return View::make('errorpage')->with('page', $post);
		}
		
		// view count
		$post->views++;
		Post::updatePost( $post );
		
		return View::make('viewpost')->with('post', $post);
	}
	
	public function processPost()
	{
		$new_post = array(
							'title'		=> Input::get('title'),
							'body'		=> Input::get('body'),
							'author_id'	=> Input::get('author_id'),
							'title_seo'	=> $this->slugify( Input::get('title') ),
							'share_id'	=> $this->generateShareLink(),
							'comments'	=> 1,
					);
				
		$rules = array(
						'title' 	=> 'required|min:3|max:128',
						'title_seo'	=> 'required|min:3|max:128',
						'body'		=> 'required',
						'share_id'	=> 'required',
		);		
		
		$v = Validator::make($new_post, $rules);
		
		if ( $v->fails() )
		{
			return Redirect::to('admin/posts')->with('user', Auth::user())->with_errors($v)->with_input();
		}
				
		$post = new Post($new_post);
		$post->save();

		return Redirect::to( 'article/' . $post->title_seo );
	}
	
	public function processEdit( $slug )
	{
		$post = Post::findBySlug( $slug );
		
		$data = array(
							'id'		=>	$post->id,
							'title'		=>	Input::get('title'),
							'body'		=>	Input::get('body'),
							'author_id'	=>	Input::get('author_id'),
							'title_seo'	=>	$post->title_seo,
							'comments'	=>	Input::get('comments'),
							'views'		=>	$post->views,
							'share_id'	=>	$post->share_id,
					);
		
		$rules = array(
				'title' 	=> 'required|min:3|max:128',
				'title_seo'	=> 'required|min:3|max:128',
				'body'		=> 'required',
		);
		
		$v = Validator::make($data, $rules);
		
		if ( $v->fails() )
		{
			return Redirect::to('admin/posts')->with('user', Auth::user())->with_errors($v)->with_input();
		}
		
		Post::updatePost( $data );
			
		return Redirect::to( 'article/' . $post->title_seo );
	}
	
	public function editPost( $post ) 
	{
		$post = Post::findBySlug($post);
		$user = Auth::user();
		
		if ( ! $post )
		{
			return App::abort(404);
		}
		
		if ( ! $user )
		{
			return App::abort(500);
		}
		
		return View::make('editpost')->with('post', $post)->with('user', $user);
	}
	
	public function deletePost($id)
	{
		if ( Auth::check() )
		{
			if ( $id )
			{
				$p = Post::findBySlug($id);
				$post = Post::find($p->id);
				if ( $post )
				{
					$post->delete();
					return Redirect::to( '/' );
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
	
	public static function shareLink($slug)
	{
		$post = DB::table('posts')->where('share_id', $slug)->first();
		
		if ( $post )
		{
			return Redirect::to('article/'.$post->title_seo);
		}
		else
		{
			return View::make('errorpage')->with('page', $slug);
		}
	}
	
	public static function generateShareLink()
	{
		$base = base_convert( rand(1,99999) , 12, 32);
		
		if ( ! is_int( $base ) )
		{
			if ( ! DB::table('posts')->where('share_id', $base)->first() )
			{
				return $base;
			}
			else
			{
				self::generateShareLink();
				exit;
			}
		}
		else
		{
			self::generateShareLink();
			exit;
		}
	}
	
	public static function slugify($string)
	{
		$string = preg_replace('#[^a-zA-Z0-9]#', '-', $string);
		$string = preg_replace('#\-{2,}#', '-', $string); // remove  double dashes
		$string = preg_replace('#^\-+#', '', $string); // remove leading dashes
		$string = preg_replace('#\-+$#', '', $string); // remove trailing dashes
		$string = strtolower($string);
		
		// make sure we have no it-s-the-little-things (the -s- is shit)
		$array = explode('-', $string);
		
		if ( $array )
		{
			foreach ( $array as $k => $a )
			{				
				if ( strlen($a) < 2 )
				{						
					unset($array[$k]);
				}
			}
		}
		
		$string = implode('-', $array);
			
		if ( Post::findBySlug($string) )
		{
			$string .= '-' . rand(1,999999);
			return $string;
		}
		else
		{
			return $string;
		}
	}
}