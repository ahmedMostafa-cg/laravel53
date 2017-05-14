<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class PagesController extends Controller
{
    public function index(){
    	if(View::exists( 'pages.index' ) )
    		return view('pages.index')
    			->with('text', 'laravel two')
    			->with('name', 'Ahmed')
    			->with(['location' => 'egypt']);
    		// return view('pages.index' , ['text' => '<b>Laravel</b>']);
    	else 
    		return 'No View Available';
    }

    public function profile(){
    	return view('pages.profile');
    }

    public function settings(){
    	return view('pages.settings');
    }

    public function blade(){
        $gender = 'male';
        return view('blade.bladetest', compact('gender'));
    }
}
