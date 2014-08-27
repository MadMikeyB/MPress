<?php

class AdminController extends BaseController 
{

	public function index()
	{
		if ( Auth::check() !== true )
		{
			return Redirect::to('login');
		}
		
		$posts = DB::table('posts')->orderBy('id', 'desc')->take('5')->get();
		$pages = DB::table('pages')->orderBy('id', 'desc')->take('5')->get();
		$users = DB::table('users')->get();
		
		$stats['users'] = DB::table('users')->count();
		$stats['posts'] = DB::table('posts')->count();
		$stats['pages'] = DB::table('pages')->count();
		$stats['mostviewed'] = DB::table('posts')->orderBy('views', 'desc')->take('5')->get();
		$stats['mostactiveauthor'] = DB::table('posts')->groupBy('author')->first();
		$stats['mostpopularpost'] = DB::table('posts')->orderBy('views', 'desc')->first();
			
		return View::make('admin')->with('posts', $posts)->with('pages', $pages)->with('stats', $stats)->with('users', $users);	
	}
	
	/*
	 * Show conversion form
	 */
	public function showWpConvertForm()
	{
		if ( Auth::check() !== true )
		{
			return Redirect::to('adminlogin');
		}
		
		return View::make('convertwpform');
	}
	
	/*
	 * Process conversion
	 */
	public function processWpConvert()
	{
		// File Uploads
		$dbname = Input::get('dbname');
		if ( empty( $dbname ) ) 
		{
			$file = Input::file('file');
			if ( $file )
			{
				$destinationPath = 'uploads/' . str_random(8);
				$filename	= $file->getClientOriginalName();
				$extension	= $file->getClientOriginalExtension();
				
				if ( $extension == 'sql' )
				{
					$uploadSuccess =	Input::file('file')->move($destinationPath, $filename);
					
					if( $uploadSuccess ) 
					{
						return Response::json('success', 200);
					} 
					else 
					{
						return Response::json('error_not_success', 400);
					}
				}
				else 
				{
					return Response::json('error_not_sql', 400);
				}
			}
			else
			{
				return Response::json('error_no_file', 400);
			}
			
			return Response::json('error_no_dbname', 400);
		}
		else
		{
			$table = array(
						'dbname' =>	Input::get('dbname'),
			);
			
			$rules = array(
					'dbname' => 'required|min:3|max:128|alpha_dash',
			);
			
			$v = Validator::make($table, $rules);
			
			if ( $v->fails() )
			{
				return Redirect::to('admin/convert/wp')->with('user', Auth::user())->with_errors($v)->with_input();
			}
			
			// look for table in db
			if ( $records = DB::table($table['dbname'])->get() )
			{
				$count = 0;
				
				foreach ($records as $record)
				{
					// weed out WordPress's revisions and partial posts. No drafts for us. Yet.
					if ( ( $record->post_status == 'publish' ) && ( $record->post_type == 'post' ) ) 
					{
						$r = array(
									'title'			=>	$record->post_title,
									'title_seo'		=>	$record->post_name,
									'body'			=>	$record->post_content,
									'author_id'		=>	$record->post_author,
									'created_at'	=>	$record->post_date_gmt,
									'updated_at'	=>	$record->post_modified_gmt,
									'comments'		=>	($record->comment_status == 'open') ? 1 : 0,
									'share_id'		=>	PostController::generateShareLink(),
								);
						
						$post = new Post($r);
						$post->save();
						$count++;
					}
				}
				
				return Redirect::to('admin')->with('flash', $count . ' articles converted.');
			}
			else
			{
				// no table? error
				return Response::json('error_no_db_table', 400);
			}
		}
	}
	
	/*
	 * Settings
	 */
	
	/*
	 * Add Setting
	 */
	
	public function showAddSetting()
	{
		
	}
	
	/*
	 * Process Add Setting
	 */
	
	public function processAddSetting()
	{
		
	}
	
	/*
	 * Settings List
	 */
	
	public function showSettingsList()
	{
		if ( Auth::check() !== true )
		{
			return Redirect::to('adminlogin');
		}
		
		$settings = Setting::findSettings();
		
		return View::make('adminsettingslist')->with('settings', $settings);
	}
	
	/*
	 * Process Settings List Update
	 */
	
	public function processSettingsUpdate()
	{
		
	}
	
	

}