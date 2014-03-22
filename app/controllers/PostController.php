<?php

class PostController extends BaseController
{
	public function index()
	{
		$data = array();
		// for sidebar
		$posts = DB::table('posts')->orderBy('created_at', 'desc')->paginate(5);
		// for main
		$post = Post::find(Post::findLatest());
		$slider = Post::findSlider(5);
		$popular = Post::findPopular(5);
		$featured = Post::findFeatured(5);
		return View::make('allposts', array('posts' => $posts, 'post' => $post, 'slider' => $slider, 'popular' => $popular, 'featured' => $featured));
	}
	
	public function showArchives( $cat=null )
	{
		if ( $cat )
		{
			$posts = DB::table('posts')->where('category', $cat)->orderBy('created_at', 'desc')->get();
		}
		else
		{
			$posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
		}
		return View::make('archives', array('posts' => $posts));
	}
	
	public function showArchivesByAuthor( $author=null )
	{
		if ( $author )
		{
			$posts = DB::table('posts')->where('author', $author)->orderBy('created_at', 'desc')->get();
			return View::make('archives', array('posts' => $posts));
		}
	}
	
	public function showPost( $post ) 
	{
		$post = Post::findBySlug( $post );
		$featured = Post::findFeatured(5);
		$categories = Post::findCategories();

		if ( !$post )
		{
			return View::make('errorpage')->with('page', $post);
		}
		
		// view count
		$post->views++;
		Post::updatePost( $post );
		
		return View::make('viewpost')->with('post', $post)->with('featured', $featured)->with('categories', $categories);
	}
	
	public function processPost()
	{

		if ( Input::hasFile('image') )
		{
			Input::file('image')->move('uploads', Input::file('image')->getClientOriginalName());
			$image = 'http://'.$_SERVER['HTTP_HOST'].'/uploads/' . Input::file('image')->getClientOriginalName();
		}
		else
		{
			$image = '';
		}

		$cat = Input::get('category');

		if ( empty( $cat ) )
		{
			$category = Input::get('existing_category');
		}
		else
		{				
			$category = 'uncategorized';	
		}

		$body = Input::get('body');

		$body = preg_replace('~
        # Match non-linked youtube URL in the wild. (Rev:20130823)
        https?://         # Required scheme. Either http or https.
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube         # or youtube.com or
          (?:-nocookie)?  # youtube-nocookie.com
          \.com           # followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\s-]       # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w-]{11})      # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w-]|$)     # Assert next char is non-ID or EOS.
        (?!               # Assert URL is not pre-linked.
          [?=&+%\w.-]*    # Allow URL (query) remainder.
          (?:             # Group pre-linked alternatives.
            [\'"][^<>]*>  # Either inside a start tag,
          | </a>          # or inside <a> element text contents.
          )               # End recognized pre-linked alts.
        )                 # End negative lookahead assertion.
        [?=&+%\w.-]*        # Consume any URL (query) remainder.
        ~ix', 
        '<iframe width="560" height="360" src="//www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>',
        $body);

		$new_post = array(
							'title'		=> Input::get('title'),
							//'body'		=> Input::get('body'),
							'body'		=> $body,
							'author_id'	=> Input::get('author_id'),
							'author'	=> Auth::user()->nickname,
							'title_seo'	=> $this->slugify( Input::get('title') ),
							'share_id'	=> $this->generateShareLink(),
							'comments'	=> 1,
							'image'		=> $image,
							'slider'	=> 0,
							'featured'	=> 0,
							'category'	=> 'uncategorized',
					);

		if ( empty( $new_post['slider'] ) )
		{
			$new_post['slider'] = '0';
		}

		if ( empty( $new_post['featured'] ) )
		{
			$new_post['featured'] = '0';
		}

		/**if ( $new_post['slider'] == '0' )
		{
			$new_post['slider'] = '1';
		}
		else
		{
			$new_post['slider'] = '0';
		}

		if ( $new_post['featured'] == '0' )
		{
			$new_post['featured'] = '1';
		}
		else
		{
			$new_post['featured'] = '0';
		}**/

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

		if ( Input::hasFile('image') )
		{
			Input::file('image')->move('uploads', Input::file('image')->getClientOriginalName());
			$image = 'http://'.$_SERVER['HTTP_HOST'].'/uploads/' . Input::file('image')->getClientOriginalName();
		}
		else
		{
			$image = $post->image;
		}

		$body = Input::get('body');

		$body = preg_replace('~
        # Match non-linked youtube URL in the wild. (Rev:20130823)
        https?://         # Required scheme. Either http or https.
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube         # or youtube.com or
          (?:-nocookie)?  # youtube-nocookie.com
          \.com           # followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\s-]       # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w-]{11})      # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w-]|$)     # Assert next char is non-ID or EOS.
        (?!               # Assert URL is not pre-linked.
          [?=&+%\w.-]*    # Allow URL (query) remainder.
          (?:             # Group pre-linked alternatives.
            [\'"][^<>]*>  # Either inside a start tag,
          | </a>          # or inside <a> element text contents.
          )               # End recognized pre-linked alts.
        )                 # End negative lookahead assertion.
        [?=&+%\w.-]*        # Consume any URL (query) remainder.
        ~ix', 
        '<iframe width="560" height="360" src="//www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>',
        $body);

		$data = array(
							'id'		=>	$post->id,
							'title'		=>	Input::get('title'),
							//'body'		=>	Input::get('body'),
							'body'		=>	$body,
							'author_id'	=>	Input::get('author_id'),
							'author'	=>	Auth::user()->nickname,
							'title_seo'	=>	$post->title_seo,
							'comments'	=>	Input::get('comments'),
							'views'		=>	$post->views,
							'share_id'	=>	$post->share_id,
							'image'		=> 	$image,
							'slider'	=> 	Input::get('slider'),
							'featured'	=> 	Input::get('featured')
					);


		if ( $data['slider'] == '0' )
		{
			$data['slider'] = '1';
		}
		else
		{
			$data['slider'] = '0';
		}

		if ( $data['featured'] == '0' )
		{
			$data['featured'] = '1';
		}
		else
		{
			$data['featured'] = '0';
		}

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