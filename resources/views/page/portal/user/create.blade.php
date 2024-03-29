@extends('template.portal.user')
@section('title')
Oinvoice-Portal-Create
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
                          <li ><a  href="{{route('dueInvoiceView.index')}}">Due Invoices</a></li>
                          <li ><a  href="{{route('draftInvoiceView.index')}}">Drafts</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a  href="{{route('addProductView.index')}}" >
                          <i class="fa fa-tasks"></i>
                          <span>Products</span>
                      </a>
                      
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

 <!-- test -->

                <div class="col-lg-12">
                <div class="form-panel">
<!-- validation -->           
          @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissable">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <p align="center" ><strong >@foreach($errors->all() as $err)
            ⚠️{{$err}} <br>
          @endforeach</strong></p> 
            </div>
          @endif
<!-- /validation -->
<!-- message -->
                  @if(session('msg'))
                <div class="alert alert-success alert-dismissable">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <p align="center" ><strong >{{session('msg')}}!</strong></p> 
            </div>
            @endif
<!-- /message -->
                     <h3  align="center"> Create New Invoice/Quotation</h3> <br>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                    <img  src="{{asset('assets/img/company_logo')}}/{{session('c_logo')}}" width="200" height="250">
                                    
                                     &nbsp <label style="font-size:17px;" name="c_name"  type="text"  ><mark>{{session('c_name')}}</mark><br><mark>Hot line </mark>: {{session('c_phone')}} <br><mark>Email</mark>: {{session('c_email')}} <br>
                                     <mark>Address</mark>: {{session('c_address')}} 
                                      </label>
                                         <hr style="border: 5px solid green;border-radius: 8px;">
                              </div>
                              <div class="col-sm-6 text-center">
                                  <select  class="form-controls" name="invoice_type" id="invoice_type"  >
  <option value="Invoice"  >Invoice</option>
  <option value="Quotation"  >Quotation</option>
  
              </select  >
              <br>
              <br>
              <?php
              $in_iv =  uniqid();
              ?>

              <input name="invoice_number" type="text" class="form-controls"  placeholder="Invoice Number" value="{{ $in_iv}}" >
              <hr style="border: px solid green;border-radius: 8px;">

                              </div>
                          </div> 
                          <!--/1st row -->
                         
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                <input  name="billfrom" type="text" class="form-controlss"  placeholder="Bill From" value="Bill From" >
                                  
                                  <input name="invoice_from" type="text" class="form-controlm"  placeholder="Who is this invoice from ? (required)" value="{{session('c_name')}}" >
              <br>
              <br>
           

              <input  name="billto" type="text" class="form-controlss"  placeholder="Bill To" value="Bill to" >
              <input name="invoice_to" type="text" class="form-controlm"  placeholder="Who is this invoice to? (required)"  >
               
               <br>
               <br>

              <input  name="mailTo" type="text" class="form-controlss"  placeholder="Mail To" value="Mail to" >
              <input name="mail_to" type="email" class="form-controlm"  placeholder="Who is this mail to? (required)"  >


                              </div>
                              <div class="col-sm-6 text-center">

                             <input  name="datex" type="text" class="form-controlss"  placeholder="Date" value="Date" >   
                             <input  name="date" type="date" class="form-controls"  id="today"  >
                              <br>
                           <input  name="paymentTermsx" type="text" class="form-controlss"  placeholder="Payment Terms" value="Payment Terms" > 
                            <input  name="payment_terms" type="text" class="form-controls"   >
                            <br>
                            <input  name="duedatex" type="text" class="form-controlss"  placeholder=" Due Date"  value="Due Date">   
                             <input  name="due_date" type="date" class="form-controls"   >
                             <br>
                            <input  name="duebanalcex" type="text" class="form-controlss"  placeholder="Balance Due" value="Balance Due" >   
                             <input id="duebalance" name="due_balance" type="text" class="form-controls"    readonly="readonly">

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
                                    
                                    <th style="min-width:500px; max-width:501px"  >Item &nbsp 
                                      

                                    </th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Amount</th>
                                    <th>Select  </th>
                                </tr>
                                </thead>

                                <tbody>
                                  <datalist id='productList'>
                                    <?php $p= 0; ?>
                                    
                    @foreach ($productList as $s)
                    
                             <option label='{{$s->p_price}}' value='{{$s->p_name}}' data-id="{{$s->p_description}}" >
                    @endforeach
                             
                                </datalist>


                    

            <tr>
              
                <td>
                  <input id='invoiceItem_0' name='invoiceItem[]' type='text' class='form-control '  placeholder='Description of service and product' list='productList' autocomplete='off' onchange='showPrice(0)'  >
                  <input id='invoiceItemDes_0' name='invoiceItemDes[]' type='text' class='form-control'  placeholder='Product description' style='visibility: hidden;' >


                </td>
                <td>
                  <div class='btn-group form-control'>
              <button type='button' class='btn btn-default btn-theme03' onclick='showDescription(0)' >Show</button>
              <button type='button' class='btn btn-default btn-theme04' onclick='hideDescription(0)' >Hide</button>
              
            </div>
          </td>
                <td><input id='quantity_0' name='invoiceQuantity[]' type='number' class='form-controlssp quantity'  onkeyup="amountCal(0)"  ></td>
                <td><input id='rate_0'  name='invoiceRate[]' type='number' class='form-controlssp rate' onkeyup="amountCal(0)"></td>
              <td><input  id='amount_0' name='invoiceAmount[]' type='number' class='form-controlssp amount'  readonly='readonly' ></td>
              <td><input type='checkbox' name='record' class='form-controlssp' ></td>
            </tr>


            
                                
                                
                                </tbody>

                            </table>
                            <button id='add-row-create' onclick="addRow(0)" type="button" class="btn btn-theme02"><i class="fa fa-plus"></i> Add Item Line</button> 
                                      &nbsp 
                            <button id='delete-row' type="button" class="btn btn-theme04"> Remove Selected Lines</button>
                                  

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
                           
                           <span style="color:blue;font-weight:bold" id="discountadd" type="button">+ Discount</span> &nbsp
                            <span style="color:green;font-weight:bold" id="taxadd" type="button">+ Tax</span> &nbsp
                            <span style="color:blue;font-weight:bold" id="Shippingadd" type="button">+ Shipping</span> &nbsp

                            

                            
                             <br>
                             <br>


                             


                             <input  name="totalx" type="text" class="form-controlss"  placeholder="Total" value="Total"   >   
                             <input id="total" name="total" type="text" class="form-controls"    readonly="readonly" >
                             <br>

                             <input id="paidx" name="paidx" type="text" class="form-controlss"  placeholder="Amount Paid" value="Amount Paid"   >   
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

      