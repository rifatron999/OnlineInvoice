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

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Components</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
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

                  
                 <h3  >Total : {{$sum_total_this}} BDT</h3>
                 <h3  >Collection: {{$sum_total_this}} BDT</h3>
                 <h3  >Due: {{$sum_due_balance_this}} BDT</h3>
                        </div>
                  <h4 align="center"> <span class="fa fa-calendar"></span> {{$this_month_v}},{{$this_year_v}}  </h4>
                      </div>

          <div class="col-md-4 col-sm-1 col-md-offset-1 box0">
                      <div style="background: #45de9e ;color: white" class="box1">

                  
                 <h3  >Total : {{$sum_total}} BDT</h3>
                 <h3  >Collection: {{$sum_total}} BDT</h3>
                 <h3  >Due: {{$sum_due_balance}} BDT</h3>
                        </div>
                  <h4 align="center"><span class="fa fa-paper-plane"></span> Overall</h4>
                      </div>


                      
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
          @endsection

      