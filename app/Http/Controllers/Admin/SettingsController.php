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

class SettingsController extends Controller 
{
	/**
     * Display Setting Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle( 'Settings Manager &mdash; ' . $this->seo()->getTitle() );
        $settings = Setting::all();
        $themes = Storage::disk('resources')->directories('themes');
        $pages = Page::all();
        return view('admin.settings.index', compact('settings', 'themes', 'pages'));
    }
    
    /**
     * Store the Setting Key Value Pair
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request)
    {
        foreach ($request->input() as $key => $value) 
        {
            Setting::set($key, $value);
        }

        return back();
    }
}