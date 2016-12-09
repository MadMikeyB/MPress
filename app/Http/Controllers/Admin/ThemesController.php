<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

use App\Page;
use App\Setting;

class ThemesController extends Controller 
{
	
	/**
     * Display Setting Listing
     *
     * @return \Illuminate\View\View
     */
    public function index( $theme = null)
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

    /**
     * View the template
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function view( $path )
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

}