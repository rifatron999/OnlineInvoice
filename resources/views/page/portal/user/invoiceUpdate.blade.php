@extends('template.portal.user')
@section('title')
Oinvoice-Update Invoice
@endsection
@section('sidebar&content')



      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="{{asset('assets/img/user_picture')}}/{{session('picture')}}" class="img-circle" width="60"></a></p>
                  <h5 class="centered">{{session('name')}}</h5>
                    
                  <li class="mt">
                      <a href="{{route('portal.index')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a   href="{{route('profileView.index')}}">
                          <i class="fa fa-user"></i>
                          <span>Profile</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active"  href="javascript:;" >
                          <i class="fa fa-file"></i>
                          <span>Invoice</span>
                      </a>
                      <ul class="sub">
                          <li class="active" ><a  href="{{route('createinvoiceView.index')}}">Create New Invoice</a></li>
                          <li><a  href="{{route('previousInvoiceView.index')}}">Invoices and Quotation</a></li>
                          <li><a  href="panels.html">Due Invoices</a></li>
                          <li><a  href="panels.html">Drafts</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a  href="{{route('addProductView.index')}}" >
                          <i class="fa fa-tasks"></i>
                          <span>Products</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
           
            <!-- create -->
            <form method="post">

 <!-- test --><h3 align="center" behavior="alternate" ><mark>{{session('success')}}</mark></h3>

                <div class="col-lg-12">
                <div class="form-panel">
                     <h3  align="center">Update Invoice</h3> <br>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                    <img  src="{{asset('assets/img/company_logo')}}/{{session('c_logo')}}" width="200" height="250">
                                    
                                     &nbsp <label style="font-size:17px;" name="c_name"  type="text"  ><mark>{{session('c_name')}}</mark><br><mark>Hot line </mark>: {{session('c_phone')}} <br><mark>Email</mark>: {{session('c_email')}} <br>
                                     <mark>Address</mark>: {{session('c_address')}} 
                                      </label>
                                         <hr style="border: 5px solid green;border-radius: 8px;">
                              </div>
                              <div class="col-sm-6 text-center">
                <select  class="form-controls" name="invoice_type"  >
                      @if($invoiceById[0]->invoice_type === 'Invoice')
                              
                              {<option value="Invoice" selected="select" >Invoice</option>
                              <option value="Quotation"  >Quotation</option>}
                      @else
                              {<option value="Invoice"  >Invoice</option>
                              <option value="Quotation" selected="select" >Quotation</option>}
                      @endif

  
              </select  >
              <br>
              <br>

              <input name="invoice_number" type="number" class="form-controls"  placeholder="Invoice Number" value="{{$invoiceById[0]->invoice_number}}">
              <hr style="border: px solid green;border-radius: 8px;">

                              </div>
                          </div> 
                          <!--/1st row -->
                         
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                <input  name="billfrom" type="text" class="form-controlss"  placeholder="Bill From" value="Bill From" >
                                  
                                  <input name="invoice_from" type="text" class="form-controlm"  placeholder="Who is this invoice from ? (required)" value="{{$invoiceById[0]->invoice_from}}" >
              <br>
              <br>
           

              <input  name="billto" type="text" class="form-controlss"  placeholder="Bill To" value="Bill to" >
              <input name="invoice_to" type="text" class="form-controlm"  placeholder="Who is this invoice to? (required)" value="{{$invoiceById[0]->invoice_to}}" >
               
               <br>
               <br>

              <input  name="mailTo" type="text" class="form-controlss"  placeholder="Mail To" value="Mail to" >
              <input name="mail_to" type="text" class="form-controlm"  placeholder="Who is this mail to? (required)" value="{{$invoiceById[0]->mail_to}}" >


                              </div>
                              <div class="col-sm-6 text-center">

                             <input  name="datex" type="text" class="form-controlss"  placeholder="Date" value="Date" >   
                             <input  name="date" type="date" class="form-controls"  value="{{$invoiceById[0]->date}}"  >
                              <br>
                           <input  name="paymentTermsx" type="text" class="form-controlss"  placeholder="Payment Terms" value="Payment Terms" > 
                            <input  name="payment_terms" type="text" class="form-controls"  value="{{$invoiceById[0]->payment_terms}}" >
                            <br>
                            <input  name="duedatex" type="text" class="form-controlss"  placeholder=" Due Date"  value="Due Date">   
                             <input  name="due_date" type="date" class="form-controls" value="{{$invoiceById[0]->due_date}}"  >
                             <br>
                            <input  name="duebanalcex" type="text" class="form-controlss"  placeholder="Balance Due" value="Balance Due"  >   
                             <input id="duebanalce" name="due_banalce" type="text" class="form-controls"  value="{{$invoiceById[0]->due_balance}}"  readonly="readonly">

                              </div>
                             
                          </div> 
                          <!--/2nd row -->

  

                          <div class="row mt">
                              <div class="col-sm-12 text-left">
                                  <!-- clm 1 -->
                                  
                                  <table class="table table-hover">
                            
                            <hr>
                                <thead>
                                <tr>
                                    
                                    <th style="min-width:500px; max-width:501px"  >Item &nbsp <button id='add-row' type="button" class="btn btn-theme02"><i class="fa fa-plus"></i> </button> 
                                      &nbsp <button id='delete-row' type="button" class="btn btn-theme04"><i class="fa fa-minus"></i> </button>

                                    </th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Amount</th>
                                    <th>Select  </th>
                                </tr>
                                </thead>

                                <tbody>
                                  <datalist id='productList'>
                    @foreach ($productList as $s)
                             <option label='Price: {{$s->p_price}}' value='{{$s->p_name}}'>
                    @endforeach
                             
                  </datalist>
                    

            <tr>
              
                <td ><input id='invoiceItem_0' name='invoiceItem[]' type='text' class='form-control'  placeholder='Description of service and product' list='productList' autocomplete='off'></td>
                <td><input id='quantity_0' name='invoiceQuantity[]' type='number' class='form-controlssp'  onkeyup="amountCal(0)"  ></td>
                <td><input id='rate_0'  name='invoiceRate[]' type='number' class='form-controlssp' onkeyup="amountCal(0)"></td>
              <td><input  id='amount_0' name='invoiceAmount[]' type='number' class='form-controlssp'  readonly='readonly' ></td>
              <td><input type='checkbox' name='record' class='form-controlssp' ></td>
            </tr>


            
                                
                                
                                </tbody>

                            </table>
                                  

                              </div>
                              
                             
                          </div> 

                          <!--/3rd row -->
                          <div class="row mt">

                              <div class="col-sm-6 text-left">
                 <hr style="border: 5px solid green;border-radius: 8px;">
                                    <!--col 1 -->
                                     <input  align="left" name="descriptionx" type="text" class="form-controlss"  placeholder="Description" value="Description" >
              <input name="description" type="text" class="form-controld"  placeholder="Any required information not already covered"  >

              <br>
              <br>

              <input  name="termsx" type="text" class="form-controlss"  placeholder="Terms" value="Terms" >
              <input name="terms" type="text" class="form-controld"  placeholder="Terms and condition e.g late fee, Delivery schedule , Payment methods "  >
                                    
                              </div>
                              <div class="col-sm-6 text-center">
                                <!--col 2 -->
                                    <input  name="subTotalx" type="text" class="form-controlss"  value="Sub Total"   >   
                             <input id="subTotal" name="Sub_total" type="number" class="form-controls"  readonly="readonly"  >
                              
                               <br>
                           
                           <p id='next' > </p>
                           
                           <span style="color:blue;font-weight:bold" id="discount" type="button">+ Discount</span> &nbsp
                            <span style="color:green;font-weight:bold" id="tax" type="button">+ Tax</span> &nbsp
                            <span style="color:blue;font-weight:bold" id="Shipping" type="button">+ Shipping</span> &nbsp

                            

                            
                             <br>
                             <br>


                             


                             <input  name="totalx" type="text" class="form-controlss"  placeholder="Total" value="Total"   >   
                             <input id="total" name="total" type="text" class="form-controls"    readonly="readonly" >
                             <br>

                             <input  name="paidx" type="text" class="form-controlss"  placeholder="Amount Paid" value="Amount Paid"   >   
                             <input id="paid" name="amount_paid" type="text" class="form-controls" onkeyup="dueCal()" >
                             <br>
                             <br>
                             <br>
                             <label for="slider">Save as Draft only: </label>
    <select name="draft"  data-role="slider">
        <option value="off">Off</option>
        <option value="on">On</option>
    </select>
                             <button type="Submit" class="btn btn-primary btn-lg">Submit Payment</button>
                            

                              </div>
                          </div> 
                          <!--/4th row -->
                          
                </div>
              </div>





                        <!-- /test -->















           
             
          </form>
            <!-- /create -->
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->


          @endsection

      