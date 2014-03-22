<?php

class PageController extends BaseController
{

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
}