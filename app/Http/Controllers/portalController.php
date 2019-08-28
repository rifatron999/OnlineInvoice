<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class portalController extends Controller
{
    

    //*** index ***

     public function index(Request $req){

        
        	
        	if($req->session()->get('type') == 'super admin')
        	{
                 return redirect()->route('superadmin.index');
        		//return view('page.portal.faculty.portal');
        	}
        	
        	else if($req->session()->get('type') == 'admin')
        	{
        		return redirect()->route('admin.index');
        	}

        	else if($req->session()->get('type') == 'user')
        	{
        		return redirect()->route('user.index');
        	}
        	
        	
        	else{
        		$req->session()->flash('msg', "UNAUTHORIZED!");
        		return redirect()->route('login.index');
        	    }

            

    }





    //### index ###
}
