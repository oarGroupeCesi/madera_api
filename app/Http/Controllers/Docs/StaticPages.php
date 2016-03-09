<?php

namespace App\Http\Controllers\Docs;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticPages extends Controller
{
    public function home()
    {
    	return view('docs.staticpages.home');
    }

    public function auth()
    {
    	return view('docs.staticpages.auth');
    }

    public function customers()
    {
    	return view('docs.staticpages.customers');
    }

    public function projects()
    {
    	return view('docs.staticpages.projects');
    }

    public function ranges()
    {
    	return view('docs.staticpages.ranges');
    }

    public function products()
    {
    	return view('docs.staticpages.products');
    }

    public function naturesModule()
    {
    	return view('docs.staticpages.natures-module');
    }

    public function modules()
    {
    	return view('docs.staticpages.modules');
    }
}
