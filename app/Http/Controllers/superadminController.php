<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class superadminController extends Controller
{

	//*** userCheck ***
public function userCheck($req)
{
       if($req->session()->get('type') == 'super admin')
       	{
            return true;
        }
        else
        {
            return false;
        }
    }
    

	//### userCheck ###

	 
    //***index ***

    	public function index(Request $req)
    	{
    		 if($this->userCheck($req))
    		 {
    			return view('page.portal.superadmin.index');
    		 }
    		 else
    		 {
    		 	$req->session()->flash('msg', "UNAUTHORIZED!");
        		return redirect()->route('login.index');
    		 }
    	}

    //### index ###



    	//***addAdminView ***

    	public function addAdminView(Request $req)
    	{
    		if($this->userCheck($req))
    		{
    			return view('page.portal.superadmin.addAdmin');
    		}
    	else
    		 {
    		 	$req->session()->flash('msg', "UNAUTHORIZED!");
        		return redirect()->route('login.index');
    		 }
    	}

    //### addAdminView ###


    	//*** addAdmin ***

    	 public function addAdmin(Request $req)
    	 {
		
		
       /*$req->validate([

            'u_name'=>'required|unique:t_users',
            'ut_password'=>'required|max:3',
            'ut_password'=>'required|max:3',
            'utc_password'=>'required|same:ut_password|max:3',
            'ut_email'=>'required',
            'ut_phone'=>'required|unique:t_temp_users',
            'ut_dob'=>'required',
            
            ]); */


//insert statrs
       //echo $req;

       DB::table('t_user')->insert([
    ['name' => $req->name,  
    'password' => $req->password ,
    'dob' => $req->dob ,
    'gender' => $req->gender,
    'email' => $req->email,
    'phone' => $req->phone,
    'type' => 'admin'
    
]
    
]);


//insert ends
       // //$msg="reg comp";
       //   return view('page.registration.registration')->with('msg', 'complete');
       
       //$req->session()->flash('msg', "✔ Your registration request has been submitted to our admin");
        		return redirect()->route('addAdminView.index');

		
		
	}




    	//### addAdmin ###
}
