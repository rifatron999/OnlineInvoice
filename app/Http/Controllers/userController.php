<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
	//*** userCheck ***
public function userCheck($req)
{
       if($req->session()->get('type') == 'user')
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
    			return view('page.portal.user.index');

    		 }
    		 else
    		 {
    		 	$req->session()->flash('msg', "UNAUTHORIZED!");
        		return redirect()->route('login.index');
    		 }
    	}

    //### index ###




    	//*** profileView ***
    	public function profileView(Request $req)
                 {
                 	if($this->userCheck($req))
    		 		{
       				 	return view('page.portal.user.profile');

    		 		}
    		 		else
    		 		{
    		 			$req->session()->flash('msg', "UNAUTHORIZED!");
        				return redirect()->route('login.index');
    		 		}
                }

    	//### profileView ###

}
