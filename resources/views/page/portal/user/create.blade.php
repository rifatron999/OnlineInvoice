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
              
                  <p class="centered"><a href="profile.html"><img src="{{asset('assets/img')}}/ui-sam.jpg" class="img-circle" width="60"></a></p>
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
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-file"></i>
                          <span>Invoice</span>
                      </a>
                      <ul class="sub">
                          <li class="active" ><a  href="">Create New Invoice</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>
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

 <!-- test -->

                <div class="col-lg-12">
                <div class="form-panel">
                     <h3  align="center"> Create New Invoice</h3> <br>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                    <img  src="{{asset('assets/img')}}/ny.jpg" width="200" height="250">
                                    
                                     &nbsp <label name="c_name"  type="text"  >{{session('c_name')}}  <br>Hot line : {{session('c_phone')}} <br>Email: {{session('c_email')}} <br>
                                     Address: {{session('c_address')}} 
                                      </label>
                                         <hr>
                              </div>
                              <div class="col-sm-6 text-center">
                                  <select  class="form-controls" name="qi" >
  <option value="invoice"  >Invoice</option>
  <option value="quotation"  >Quotation</option>
  
              </select  >
              <br>
              <br>

              <input name="invoiceNo" type="number" class="form-controls"  placeholder="Invoice Number" value="56">
                              </div>
                          </div> 
                          <!--/1st row -->
                         
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                  <input name="invoiceFrom" type="text" class="form-controlm"  placeholder="Who is this invoice from ? (required)" value="{{session('c_name')}}" >
              <br>
              <br>
           

              <input  name="billto" type="text" class="form-controlss"  placeholder="Bill To" value="Bill to" >
              <input name="invoiceTo" type="text" class="form-controlm"  placeholder="Who is this invoice to? (required)"  >
                              </div>
                              <div class="col-sm-6 text-center">

                             <input  name="datex" type="text" class="form-controlss"  placeholder="Date" value="Date" >   
                             <input  name="date" type="date" class="form-controls"  id="today"  >
                              <br>
                           <input  name="paymentTermsx" type="text" class="form-controlss"  placeholder="Payment Terms" value="Payment Terms" > 
                            <input  name="paymentTermsx" type="text" class="form-controls"   >
                            <br>
                            <input  name="duedatex" type="text" class="form-controlss"  placeholder=" Due Date"  >   
                             <input  name="duedate" type="date" class="form-controls"   >
                             <br>
                            <input  name="duebanalcex" type="text" class="form-controlss"  placeholder="Balance Due"  >   
                             <input  name="duebanalce" type="text" class="form-controls"   value="$" disabled>

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
                                <tr>
                <td ><input name='invoiceItem' type='text' class='form-control'  placeholder='Description of service and product'  ></td>
                <td><input  name='invoiceQuantity' type='number' class='form-controlssp'    ></td>
                <td><input  name='invoiceRate' type='number' class='form-controlssp'    ></td>
              <td><input  name='invoiceAmount' type='number' class='form-controlssp' disabled   ></td>
              <td><input type='checkbox' name='record' class='form-controlssp' ></td>
            </tr>
                                
                                
                                </tbody>
                            </table>
                                  

                              </div>
                              
                             
                          </div> 

                          <!--/3rd row -->
                          
                </div>
              </div>





                        <!-- /test -->













           
             
          </form>
            <!-- /create -->
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->


          @endsection

      