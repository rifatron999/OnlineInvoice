<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{
	//*** userCheck ***
public function userCheck($req)
{
       if($req->session()->get('type') == 'admin')
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
    			return view('page.portal.admin.index');
    		 }
    		 else
    		 {
    		 	$req->session()->flash('msg', "UNAUTHORIZED!");
        		return redirect()->route('login.index');
    		 }
    	}

    //### index ###



    	//***userListView ***

    	public function userListView(Request $req)
    	{
    		if($this->userCheck($req))
    		{
    			$userList	= DB::table('t_user')->where('type','user')->get();
    			//echo $userList;
    			return view('page.portal.admin.userList', ['userList' => $userList ]);
    		}
    	else
    		 {
    		 	$req->session()->flash('msg', "UNAUTHORIZED!");
        		return redirect()->route('login.index');
    		 }
    	}

    //### userListView ###



        //*** removeUser ***

public function removeUser($id,Request $req){
         if($this->userCheck($req))
                    {
$facultySlideList   = DB::table('t_user')->where('id', $id)
->delete();




         return back()->with('msg', "✘ User REMOVED");
        }
    
    else{
        $request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
    }
    //### removeUser ###
}
