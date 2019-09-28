<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

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
                $invoiceSum = DB::table('t_invoice')
       ->where('invoice_from', $req->session()->get('c_name'))
       ->where('invoice_type','Invoice')
       ->where('draft','off')
        ->get();
                return view('page.portal.user.index',['invoiceSum' => $invoiceSum]);

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
        
        
        $req->validate([

            
          /* 'picture'=> 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
           'company_logo'=> 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
*/


            
         ]); 

//***image
        $fileName;
        if($req->file('picture') == null){$fileName = session('picture');}
        else
        {
             $file = $req->file('picture');
           $fileName = $req->name.'.'.$file->getClientOriginalExtension(); //^^bug
           //echo $fileName;
           $file->move('assets/img/user_picture', $fileName);
        }
          
//###image

//***company_logo
         $fileName1;
        if($req->file('company_logo') == null){$fileName1 = session('c_logo');}
        else
        {
           $file = $req->file('company_logo');
           $fileName1 = $req->c_name.'.'.$file->getClientOriginalExtension();
           //echo $fileName;
           $file->move('assets/img/company_logo', $fileName1);
           }
//###company_logo


        $companyInfoExist   = DB::table('t_company')->where('c_owner', $req->session()->get('name'))->get();


DB::table('t_user')->where('name', $req->session()->get('name'))
->update([
    
         
    'name' => $req->name ,
    'password' => $req->password ,
    'email' => $req->email,
    'dob' => $req->dob,
    'phone' => $req->phone,
    'picture' => $fileName
    
]);





        if(count($companyInfoExist) > 0)
        { //updade

              DB::table('t_company')->where('c_owner', $req->session()->get('name'))->update([
    
         
    'c_name' => $req->c_name,  
    'c_address' => $req->c_address,  
    'c_phone' => $req->c_phone,  
    'c_email' => $req->c_email,
    'c_owner' => $req->name,
    'c_logo' => $fileName1
    
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
        'c_owner' => $req->name,
        'c_logo' => $fileName1

   
]   
]);

        }










            $req->session()->put('name', $req->name );
            $req->session()->put('password', $req->password );
            $req->session()->put('dob', $req->dob );
            $req->session()->put('email', $req->email );
            $req->session()->put('phone', $req->phone );
            $req->session()->put('picture', $fileName );

            $req->session()->put('c_name', $req->c_name );
            $req->session()->put('c_address', $req->c_address );
            $req->session()->put('c_phone', $req->c_phone );
            $req->session()->put('c_email', $req->c_email );
             $req->session()->put('c_logo', $fileName1 );



        //echo 'update called';

      //  $req->session()->flash('msg', "✔ Your Tsf has been Updated");
                return redirect()->route('profileView.index');
        

    }
    
    //### profileUpdate ###



//**************************************************** ~Product *****************************************************

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
        
        
             $req->validate([
            'product_name'=>'required',
            ]); 


//insert statrs
       //echo $req;

       DB::table('t_product')->insert([
    [
        'p_name' => $req->product_name,  
        'p_description' => $req->p_description,  
        'p_price' => $req->p_price ,
        'p_owner' => $req->session()->get('name') 
   
    
    
]
    
]);


//insert ends
       // //$msg="reg comp";
       //   return view('page.registration.registration')->with('msg', 'complete');
       
       $req->session()->flash('msg', "✔ Product Added");
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
        
        
       $req->validate([
            'product_name'=>'required',
            ]);
        


DB::table('t_product')->where('p_id', $p_id)
->update([
    
         
    
    'p_name' => $req->product_name ,
    'p_price' => $req->p_price ,
    'p_description' => $req->p_description 
    
    
]);

$req->session()->flash('msg', "✔ Product Updated");
return redirect()->route('addProductView.index');

        

    }
    
    //### productUpdate ###





    //*** deleteProduct ***

public function deleteProduct($p_id,Request $req){
         if($this->userCheck($req))
                    {
$facultySlideList   = DB::table('t_product')->where('p_id', $p_id)
->delete();




         return back()->with('msg', "✘ Product Removed");
        }
    
    else{
        $request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
    }
    //### deleteProduct ###

    //###################################################### product #############################################



     //*** createinvoiceView ***

        public function createinvoiceView(Request $req)
        {
            
             if($this->userCheck($req))
             {
                $productList   = DB::table('t_product')->where('p_owner', $req->session()->get('name'))->get();
                return view('page.portal.user.create',['productList'=>$productList]);

             }
             else
             {
                $req->session()->flash('msg', "UNAUTHORIZED!");
                return redirect()->route('login.index');
             }
        }

    //### createinvoiceView ###



         //*** createinvoice ***

        public function createinvoice(Request $req)
        {
            
             if($this->userCheck($req))
             {
               // echo $req->totalx;
                /*echo '<pre>';
                print_r($req->invoiceItem);
                print_r($req->invoiceQuantity);
                print_r($req->invoiceRate);
                print_r($req->invoiceAmount);
                echo '</pre>';*/


                //*** insert invoice
                //echo $req;
             /*echo  $req->invoice_type; echo "<br>";
             echo  $req->invoice_number; echo "<br>";
             echo  $req->invoice_from; echo "<br>";
             echo  $req->invoice_to; echo "<br>";
             echo  $req->date; echo "<br>";
             echo  $req->due_date; echo "<br>";

                $invoiceItem = json_encode($req->invoiceItem);
                $invoiceQuantity = json_encode($req->invoiceQuantity);
                $invoiceRate = json_encode($req->invoiceRate);
                $invoiceAmount = json_encode($req->invoiceAmount);
                echo  $invoiceItem;echo "<br>";
                echo  $invoiceQuantity;echo "<br>";
                echo  $invoiceRate;echo "<br>";
                echo  $invoiceAmount;echo "<br>";
             echo  $req->Sub_total; echo "<br>";
             echo  $req->shipping; echo "<br>";
             echo  $req->tax; echo "<br>";
             echo  $req->discount; echo "<br>";
             echo  $req->total; echo "<br>";
             echo  $req->amount_paid; echo "<br>";
             echo  $req->due_banalce; echo "<br>";
             echo  $req->description; echo "<br>";
             echo  $req->terms; echo "<br>";
             echo  $req->payment_terms; echo "<br>";*/

//***  encode main ***
    $invoiceItem = json_encode($req->invoiceItem);
    $invoiceQuantity = json_encode($req->invoiceQuantity);
    $invoiceRate = json_encode($req->invoiceRate);
    $invoiceAmount = json_encode($req->invoiceAmount);
    $invoiceItemDes = json_encode($req->invoiceItemDes);


//### encode main ###


//*** insert main ***
    
     DB::table('t_invoice')
     ->insert([
    [
    'invoice_from' => $req->invoice_from,  
    'invoice_to' => $req->invoice_to,  
     'mail_to' => $req->mail_to,
    'invoice_type' => $req->invoice_type,  
    'invoice_number' => $req->invoice_number,  
    'date' => $req->date,  
    'due_date' => $req->due_date,  
    'item' => $invoiceItem,  
    'itemDescription' => $invoiceItemDes,  
    'quantity' => $invoiceQuantity,  
    'rate' => $invoiceRate,  
    'amount' => $invoiceAmount,  
    'Sub_total' => $req->Sub_total,  
    'tax' => $req->tax,  
    'discount' => $req->discount,
    'shipping' => $req->shipping,
    'total' => $req->total,  
    'amount_paid' => $req->amount_paid,  
   'due_balance' => $req->due_balance,
    'description' => $req->description,  
    'terms' => $req->terms,  
    'payment_terms' => $req->payment_terms,  
    'draft' => $req->draft,  
   ]   
]);
 
 //### insert main ###

//*** pdf main ***
        $pdf = PDF::loadView('page.portal.user.invoice', compact('req'))
        ->save( 'pdf/invoice.pdf' );
        //return $pdf->setPaper('A4','landscape')->stream('invoice.pdf');
//### pdf  main ###

//*** mail ***
        if($req->draft == 'off')
        {
        $data = array(
        'invoice_type' => $req->invoice_type,
        'invoice_number' => $req->invoice_number,
        'invoice_from' => $req->invoice_from,
        'invoice_to' => $req->invoice_to,
        'mail_to' => $req->mail_to,
        'due_date' => $req->due_date,
        'date' => $req->date,
        'due_balance' => $req->due_balance,
        'amount_paid' => $req->amount_paid,
        'description' => $req->description,
        'total' => $req->total,
        'terms' => $req->terms,
        );
        
        //echo $email;
        
        Mail::to($req->mail_to)->send(new sendMail($data));
        return back()->with('success','Mail sent to '.$req->invoice_to);
        }
//### mail ###

        else{return back()->with('success','Draft saved for '.$req->invoice_to);}
                //### insert invoice
               
                //*json
                //*encode
               /* $invoiceItem = $req->invoiceItem;
                $invoiceQuantity = $req->invoiceQuantity;
                $invoiceRate = $req->invoiceRate;
                $invoiceAmount = $req->invoiceAmount;

                $invoiceItemd = json_encode($invoiceItem);
                $invoiceQuantityd = json_encode($invoiceQuantity);
                $invoiceRated = json_encode($invoiceRate);
                $invoiceAmountd = json_encode($invoiceAmount);*/

                /*echo $invoiceItem;
                echo "<br>";
                echo $invoiceQuantity;
                echo "<br>";
                echo $invoiceRate;
                echo "<br>";
                echo $invoiceAmount;*/
                //#encode
                //*decode
                /* $invoice = DB::table('t_invoice')->get();
                 //echo $invoice[0]->item;
                 $din = json_decode($invoice[0]->item);
                foreach($din as $value)
                {
                echo $value . "<br>";
                }
                */
                //#decode

                //#json

//insert
      /*DB::table('t_invoice')->insert([
    [

     
    'item' => $invoiceItemd,  
    'iid' => $req->invoice_No,  
    'type' => $req->invoice_option

   
]   
]);*/
//#insert



               // return view('page.portal.user.create');

               //*pdf
                /*$pdf = PDF::loadView('page.portal.user.invoice', compact('req'))
                ->save( 'pdf/invoice.pdf' );*/
                //return $pdf->setPaper('A4','landscape')->stream('invoice.pdf');
                //#pdf

                /*$url = Storage::url('invoice.pdf');
                echo $url;*/
                               

                //*mail
                   /* $data = array(
                        'invoice_No' => $req->invoice_No,
                        'invoiceFrom' => $req->invoiceFrom,
                        'invoiceTo' => $req->invoiceTo,
                        'duedate' => $req->duedate,
                        'description' => $req->description,
                        
                        
                        
                    );
                    Mail::to('rifatron99@gmail.com')->send(new sendMail($data));
                    return back()->with('success','mail sent');*/
                     //#mail


                /*    $to_name = 'kawsar';
$to_email = 'rifatron999@gmail.com';
$data = array('name'=>"Sam Jose", "body" => "Test mail");
    
Mail::send('page.portal.user.email', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
            ->subject('Artisans Web Testing Mail');
    $message->from('noreply.oinvoice@gmail.com','Artisans Web');*/


               



             }
         

             else
             {
                $req->session()->flash('msg', "UNAUTHORIZED!");
                return redirect()->route('login.index');
             }
        }

    //### createinvoice ###

        //*** previousInvoiceView ***

        public function previousInvoiceView(Request $req)
        {
            
             if($this->userCheck($req))
             {
                
                $invoiceList   = DB::table('t_invoice')->where('draft', 'off')->where('invoice_from', $req->session()->get('c_name'))->get();

                return view('page.portal.user.previousInvoiceList',['invoiceList'=>$invoiceList]);

             }
             else
             {
                $req->session()->flash('msg', "UNAUTHORIZED!");
                return redirect()->route('login.index');
             }
        }

    //### previousInvoiceView ###

         //*** invoiceUpdateView ***

        public function invoiceUpdateView($invoice_number,Request $req)
        {
            
             if($this->userCheck($req))
             {
                
                $invoiceById   = DB::table('t_invoice')->where('invoice_number',$invoice_number)->get();
                $productList   = DB::table('t_product')->where('p_owner', $req->session()->get('name'))->get();

                return view('page.portal.user.invoiceUpdate',['invoiceById'=>$invoiceById,'productList'=>$productList]);

             }
             else
             {
                $req->session()->flash('msg', "UNAUTHORIZED!");
                return redirect()->route('login.index');
             }
        }

    //### invoiceUpdateView ###
         //*** invoiceUpdate ***

     public function invoiceUpdate($invoice_number,Request $req)
     {
        //***encode main
    $invoiceItem = json_encode($req->invoiceItem);
    $invoiceQuantity = json_encode($req->invoiceQuantity);
    $invoiceRate = json_encode($req->invoiceRate);
    $invoiceAmount = json_encode($req->invoiceAmount);
    $invoiceItemDes = json_encode($req->invoiceItemDes);
   
    //###encode main
        

DB::table('t_invoice')->where('invoice_number', $invoice_number)
->update([
    
         
    
    'invoice_from' => $req->invoice_from,  
    'invoice_to' => $req->invoice_to,  
     'mail_to' => $req->mail_to,
    'invoice_type' => $req->invoice_type,  
    'invoice_number' => $req->invoice_number,  
    'date' => $req->date,  
    'due_date' => $req->due_date,  
    'item' => $invoiceItem,  
    'itemDescription' => $invoiceItemDes, 
    'quantity' => $invoiceQuantity,  
    'rate' => $invoiceRate,  
    'amount' => $invoiceAmount,  
    'Sub_total' => $req->Sub_total,  
    'tax' => $req->tax,  
    'discount' => $req->discount,
    'shipping' => $req->shipping,
    'total' => $req->total,  
    'amount_paid' => $req->amount_paid,  
   'due_balance' => $req->due_balance,
    'description' => $req->description,  
    'terms' => $req->terms,  
    'payment_terms' => $req->payment_terms,  
    'draft' => $req->draft,  
    
    
]);

//*pdf main
        $pdf = PDF::loadView('page.portal.user.invoice', compact('req'))
        ->save( 'pdf/invoice.pdf' );
        //return $pdf->setPaper('A4','landscape')->stream('invoice.pdf');
    //#pdf  main

    //*mail
        if($req->draft == 'off')
        {
        $data = array(
        'invoice_type' => $req->invoice_type,
        'invoice_number' => $req->invoice_number,
        'invoice_from' => $req->invoice_from,
        'invoice_to' => $req->invoice_to,
        'mail_to' => $req->mail_to,
        'due_date' => $req->due_date,
        'date' => $req->date,
        'due_balance' => $req->due_balance,
        'amount_paid' => $req->amount_paid,
        'description' => $req->description,
        'total' => $req->total,
        'terms' => $req->terms,
        );
        
        //echo $email;
        
        Mail::to($req->mail_to)->send(new sendMail($data));
        return back()->with('success','Mail sent to '.$req->invoice_to);
        }
                     //#mail
return back()->with('success',$req->invoice_type.' Updated');

        

    }
    
    //### invoiceUpdate ###

    //*** dueInvoiceView ***

        public function dueInvoiceView(Request $req)
        {
            
             if($this->userCheck($req))
             {
                
                $invoiceList   = DB::table('t_invoice')->where('invoice_type', 'Invoice')->where('due_balance', '>', 0)->where('invoice_from', $req->session()->get('c_name'))->get();

                return view('page.portal.user.dueInvoiceList',['invoiceList'=>$invoiceList]);

             }
             else
             {
                $req->session()->flash('msg', "UNAUTHORIZED!");
                return redirect()->route('login.index');
             }
        }

    //### dueInvoiceView ###
        //*** dueInvoiceView ***

        public function draftInvoiceView(Request $req)
        {
            
             if($this->userCheck($req))
             {
                
                $invoiceList   = DB::table('t_invoice')->where('draft', 'on')->where('invoice_from', $req->session()->get('c_name'))->get();

                return view('page.portal.user.draftInvoiceList',['invoiceList'=>$invoiceList]);

             }
             else
             {
                $req->session()->flash('msg', "UNAUTHORIZED!");
                return redirect()->route('login.index');
             }
        }

    //### dueInvoiceView ###

        //*** productFetch ***

        public function productFetch(Request $req)
        {
            
             if($this->userCheck($req))
             {
                if($req->get('query'))
     {
      $query = $req->get('query');
      $data = DB::table('t_product')
        ->where('p_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->p_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }     



             }
             else
             {
                $req->session()->flash('msg', "UNAUTHORIZED!");
                return redirect()->route('login.index');
             }
        }

    //### productFetch ###



        












}


