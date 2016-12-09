<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
// use App\Plugin;

class PluginsController extends Controller 
{
	/**
     * Display Plugin Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle( 'Plugin Manager &mdash; ' . $this->seo()->getTitle() );
        $plugins = Storage::disk('plugins')->directories();
        $plugin = [];
        if ( $plugins )
        {
        	foreach ( $plugins as $k => $v )
        	{
 				$files = Storage::disk('plugins')->allFiles($v);
 				foreach ( $files as $file )
 				{
 					if ( preg_match('#config.php#', $file ) )
					{
						$config = file( app_path('Plugins/') . $file );
	 					dd($config);
	 				}
 				}

        	}
        }
        // return view('admin.plugins.index', compact('plugins'));
    }
}