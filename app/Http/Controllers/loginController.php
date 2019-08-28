<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    //***index ***

    	public function index()
    	{
    		return view('page.login.index');
    	}

    //### index ###


    	  //*** test ***

    	public function test()
    	{
    		return view('page.portal.user.index');
    	}

    //### test ###





    	//*** signin ***

    	public function signin(Request $req){
		
		
       /*$req->validate([

            'u_name'=>'required',
            'u_password'=>'required|max:3',
            
        ]); */


		
		$result	= DB::table('t_user')->where('name', $req->name)
				 ->where('password', $req->password)
				 ->get();

		//echo $result;

		if(count($result) > 0){
			
			$req->session()->put('name', $req->name );
			
			$req->session()->put('type', $result[0]->type );
			$req->session()->put('password', $result[0]->password );
			$req->session()->put('dob', $result[0]->dob );
			$req->session()->put('gender', $result[0]->gender );
			$req->session()->put('email', $result[0]->email );
			$req->session()->put('phone', $result[0]->phone );
			//$req->session()->put('u_pic', $result[0]->pic );
			
			//return redirect()->route('home.index');
			return redirect()->route('portal.index');
		}else{
			$req->session()->flash('msg', "⚠️ Invalid Username or Password!");
			
			return redirect()->route('login.index');
			//return view('login.index');
		}

	}


    	//### signin ###







}
