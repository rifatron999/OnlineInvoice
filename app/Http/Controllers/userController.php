<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //***index ***

    	public function index(Request $req)
    	{
    		return view('page.portal.user.index');
    	}

    //### index ###

}
