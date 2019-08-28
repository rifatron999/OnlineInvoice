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

            'name'=>'required|unique:t_users',
            'password'=>'required|max:3',
            'cpassword'=>'required|max:3',
            'email'=>'required',
            'phone'=>'required|unique:t_temp_users',
            'dob'=>'required',
            
            ]); 
*/

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

		//***userListView ***

    	public function userListView(Request $req)
    	{
    		if($this->userCheck($req))
    		{
    			$userList	= DB::table('t_user')->get();
    			//echo $userList;
    			return view('page.portal.superadmin.userList', ['userList' => $userList ]);
    		}
    	else
    		 {
    		 	$req->session()->flash('msg', "UNAUTHORIZED!");
        		return redirect()->route('login.index');
    		 }
    	}

    //### userListView ###









}
