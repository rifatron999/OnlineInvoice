<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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






                //*** profileUpdate ***

     public function profileUpdate(Request $req){
        //echo $req;
        
        
//        $req->validate([

            
//             't_sun'=>'required',
//             't_mon'=>'required',
            
            


            
//         ]); 

        $companyInfoExist   = DB::table('t_company')->where('c_owner', $req->session()->get('name'))->get();


DB::table('t_user')->where('name', $req->session()->get('name'))
->update([
    
         
    'name' => $req->name ,
    'password' => $req->password ,
    'email' => $req->email,
    'dob' => $req->dob,
    'phone' => $req->phone,
    
]);





        if(count($companyInfoExist) > 0)
        { //updade

              DB::table('t_company')->where('c_owner', $req->session()->get('name'))->update([
    
         
    'c_name' => $req->c_name,  
    'c_address' => $req->c_address,  
    'c_phone' => $req->c_phone,  
    'c_email' => $req->c_email,
    'c_owner' => $req->name 
    
]);

        }
        else 
        {
            //insert
              DB::table('t_company')->insert([
    [

    'c_name' => $req->c_name,  
    'c_address' => $req->c_address,  
    'c_phone' => $req->c_phone,  
    'c_email' => $req->c_email,
        'c_owner' => $req->name 

   
]   
]);

        }










            $req->session()->put('name', $req->name );
            $req->session()->put('password', $req->password );
            $req->session()->put('dob', $req->dob );
            $req->session()->put('email', $req->email );
            $req->session()->put('phone', $req->phone );

            $req->session()->put('c_name', $req->c_name );
            $req->session()->put('c_address', $req->c_address );
            $req->session()->put('c_phone', $req->c_phone );
            $req->session()->put('c_email', $req->c_email );



        //echo 'update called';

      //  $req->session()->flash('msg', "✔ Your Tsf has been Updated");
                return redirect()->route('profileView.index');
        

    }
    
    //### profileUpdate ###

}
