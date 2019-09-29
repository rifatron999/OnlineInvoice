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
		
		
       $req->validate([

            'name'=>'required',
            'password'=>'required',
            
        ]); 


		
		$result	= DB::table('t_user')->where('name', $req->name)
				 ->where('password', $req->password)
				 ->get();
				 $result1	= DB::table('t_company')->where('c_owner', $req->name)->get();

		//echo $result;

		if(count($result) > 0){
			
			$req->session()->put('name', $req->name );
			
			$req->session()->put('type', $result[0]->type );
			$req->session()->put('password', $result[0]->password );
			$req->session()->put('dob', $result[0]->dob );
			$req->session()->put('gender', $result[0]->gender );
			$req->session()->put('email', $result[0]->email );
			$req->session()->put('phone', $result[0]->phone );
			$req->session()->put('picture', $result[0]->picture );

			if(count($result1) > 0)
			{
			$req->session()->put('c_name', $result1[0]->c_name );
            $req->session()->put('c_address', $result1[0]->c_address );
            $req->session()->put('c_phone', $result1[0]->c_phone );
            $req->session()->put('c_email', $result1[0]->c_email );
            $req->session()->put('c_currency', $result1[0]->c_currency );
            if($result1[0]->c_logo == null)
            {
            	  $req->session()->put('c_logo', 'blank.png' );
            }
            else
            {
            	  $req->session()->put('c_logo', $result1[0]->c_logo );

            }
          
        	}




			
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
