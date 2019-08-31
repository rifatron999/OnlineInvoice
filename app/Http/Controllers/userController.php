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





    //*** addProductView ***
        public function addProductView(Request $req)
                 {
                    $productList   = DB::table('t_product')->where('p_owner', $req->session()->get('name'))
                    ->get();
                    if($this->userCheck($req))
                    {
                        return view('page.portal.user.addproduct', ['productList' => $productList ]);

                    }
                    else
                    {
                        $req->session()->flash('msg', "UNAUTHORIZED!");
                        return redirect()->route('login.index');
                    }
                }

        //### addProductView ###



                //*** addProduct ***

         public function addProduct(Request $req)
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

       DB::table('t_product')->insert([
    [
        'p_name' => $req->p_name,  
        'p_price' => $req->p_price,  
        'p_stock' => $req->p_stock,  
        'p_owner' => $req->session()->get('name') 
   
    
    
]
    
]);


//insert ends
       // //$msg="reg comp";
       //   return view('page.registration.registration')->with('msg', 'complete');
       
       //$req->session()->flash('msg', "✔ Your registration request has been submitted to our admin");
                return redirect()->route('addProductView.index');

        
        
    }




        //### addProduct ###




    //*** productUpdateView *** 

public function productUpdateView($p_id,Request $req)
{   
    $productByid   = DB::table('t_product')->where('p_id', $p_id)->get();


    if($this->userCheck($req))
                    {
                        return view('page.portal.user.updateproduct', ['productByid' => $productByid ]);

                    }
                    else
                    {
                        $req->session()->flash('msg', "UNAUTHORIZED!");
                        return redirect()->route('login.index');
                    }


}
        
  


  //### productUpdateView ###



                //*** productUpdate ***

     public function productUpdate($p_id,Request $req){
        //echo $req;
        
        
//        $req->validate([

            
//             't_sun'=>'required',
//             't_mon'=>'required',
            
            


            
//         ]); 

        


DB::table('t_product')->where('p_id', $p_id)
->update([
    
         
    
    'p_price' => $req->p_price ,
    'p_stock' => $req->p_stock
    
    
]);


return redirect()->route('addProductView.index');

        

    }
    
    //### productUpdate ###





    //*** deleteProduct ***

public function deleteProduct($p_id,Request $req){
         if($this->userCheck($req))
                    {
$facultySlideList   = DB::table('t_product')->where('p_id', $p_id)
->delete();




         return back()->with('msg', "✘ SLIDE REMOVED");
        }
    
    else{
        $request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
    }
    //### deleteProduct ###










}


