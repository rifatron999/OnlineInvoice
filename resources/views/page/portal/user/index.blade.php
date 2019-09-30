@extends('template.portal.user')
@section('title')
Oinvoice-Portal
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
                      <a class="active" href="{{route('portal.index')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a  href="{{route('profileView.index')}}">
                          <i class="fa fa-user"></i>
                          <span>Profile</span>
                      </a>
                  </li>
                 <li class="sub-menu">
                      <a   href="javascript:;" >
                          <i class="fa fa-file"></i>
                          <span>Invoice</span>
                      </a>
                      <ul class="sub">
                          <li  ><a  href="{{route('createinvoiceView.index')}}">Create New Invoice</a></li>
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
            
           
            <div class="row mt">
              <div class="col-lg-12">
             
              
              <?php 
              $sum_total = 0 ;
              $sum_amount_paid = 0 ;
              $sum_due_balance = 0 ;

              $sum_total_this = 0 ;
              $sum_amount_paid_this = 0 ;
              $sum_due_balance_this = 0 ;

              
              
              $todayDate = date("Y-m-d");
              $this_month = date("m",strtotime($todayDate));
              //echo $todayDate;
              $this_month_v = date("F",strtotime($todayDate));
              $this_year_v = date("Y",strtotime($todayDate));

              ?>

               @foreach ($invoiceSum as $s) 
               <?php 
               $sum_total += $s->total ;
               $sum_amount_paid += $s->amount_paid ;
               $sum_due_balance += $s->due_balance ;
               $date = $s->date ;
               $month = date("m",strtotime($date));
               if($this_month == $month)
               {
                $sum_total_this += $s->total ;
               $sum_amount_paid_this += $s->amount_paid ;
               $sum_due_balance_this += $s->due_balance ;

               }


               ?>
              
              
              @endforeach
              <!-- ******** total **********<br>
              total {{$sum_total}} <br>
              amount paid {{$sum_amount_paid}} <br>
              due balance {{$sum_due_balance}} <br>
              ***** this month *****<br>
              total {{$sum_total_this}} <br>
              amount paid {{$sum_amount_paid_this}} <br>
              due balance {{$sum_due_balance_this}} <br>
              this month {{$this_month}} <br> -->
              
              </div>
            </div>

        

          <div class="col-md-4 col-sm-1 col-md-offset-1 box0">
                        <div style="background: #73a7fa ;color: white" class="box1">

                  
                 <h3 style="color: yellow" >Total : {{$sum_total_this}} {{session('c_currency')}}</h3>
                 <h3  >Collection: {{$sum_amount_paid_this}} {{session('c_currency')}}</h3>
                 <h3  >Due: {{$sum_due_balance_this}} {{session('c_currency')}}</h3>
                        </div>
                  <h4 align="center"> <span class="fa fa-calendar"></span> {{$this_month_v}},{{$this_year_v}}  </h4>
                      </div>

          <div class="col-md-4 col-sm-1 col-md-offset-1 box0">
                      <div style="background: #45de9e ;color: white" class="box1">

                  
                 <h3  >Total : {{$sum_total}} {{session('c_currency')}}</h3>
                 <h3  >Collection: {{$sum_amount_paid}} {{session('c_currency')}}</h3>
                 <h3 style="color: red" >Due: {{$sum_due_balance}} {{session('c_currency')}}</h3>
                        </div>
                  <h4 align="center"><span class="fa fa-paper-plane"></span> Overall</h4>
                      </div>
                      <br>
                      <br>


                       <!-- Prevoius invoicelist table -->
             
<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                        <font size="4"  >
                          <table class="table table-striped  table-hover">
                            <h4 style="text-align:center;" > Due Invoices</h4>
                            <hr>
                              <thead>
                              <tr >
                                  <th><i class="fa fa-bullhorn"></i> Id</th>
                                  <th><i class="fa fa-bullhorn"></i> Type</th>
                                  <th><i class=""></i> To</th>
                                  <th><i class=" "></i>Issue Date</th>
                                  <th><i class=" "></i>Deadline</th>
                                  <th><i class=" fa fa-edit"></i> Total</th>
                                  <th><i class=" fa fa-edit"></i> Due </th>
                                  <th><i class=" fa fa-edit"></i> Update </th>
                                  <th><i class=" fa fa-edit"></i> Delete </th>
                                  <th></th>
                              </tr>
                              </thead>

                              <tbody>
                                 @foreach ($invoiceList as $s) 
                              <tr>
                                  <td><a >{{$s->invoice_number}}</a></td>
                                  <td><a >{{$s->invoice_type}}</a></td>
                                  <td><a >{{$s->invoice_to}}</a></td>
                                  <td><a href="">{{$s->date}}</a></td>
                                  <td>
                                    @if($s->due_date === $todayDate)
                                    <a href=""><mark style="background-color: yellow;color: green;" >{{$s->due_date}}</mark></a>@elseif($s->due_date <= $todayDate)
                                    <a href=""><mark style="background-color: red;color: white;" >{{$s->due_date}}</mark></a>
                                    @else
                                    <a href=""><mark style="background-color: green;color: white;" >{{$s->due_date}}</mark></a>
                                    @endif
                                  </td>
                                  <td><a >{{$s->total}}</a></td>
                                  <td><a >{{$s->due_balance}}</a></td>
                                                                   
                                  <td> <a href="{{route('invoiceUpdateView',$s->invoice_number )}}" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></a></td>
                                  <td>
                                     
      
           <a class="btn btn-danger btn-xs" href="{{route('removeProduct',$s->invoice_number )}}" ><i class="fa fa-trash-o "></i></a>
            

        
                                      
                                      
                                  </td>
                              </tr>
                               @endforeach
                              
                              </tbody>
                          </table>
                        </font>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

            <!-- /Prevoius invoicelist table -->


                      
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
          @endsection

      