<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registrationController extends Controller
{
    
    //***index ***

    	public function index()
    	{
    		return view('page.registration.index');
    	}

    //### index ###

    	//*** signup ***

    	 public function signup(Request $req)
    	 {
		
		
       $req->validate([
'name'=>'required|unique:t_user',
            'password'=>'required|min:3',
            'confirm_password'=>'required|same:password|max:3',
            'phone'=>'required|unique:t_user',
            'gender'=>'required'
            
            ]); 


//insert statrs
       //echo $req;

       DB::table('t_user')->insert([
    ['name' => $req->name,  
    'password' => $req->password ,
    
    'gender' => $req->gender,
    
    'phone' => $req->phone,
    'type' => 'user'
    
]
    
]);


//insert ends
       // //$msg="reg comp";
       //   return view('page.registration.registration')->with('msg', 'complete');
       
       $req->session()->flash('msg', "✔ Registration Completed");
        		return redirect()->route('registration.index');

		
		
	}




    	//### signup ###






}
