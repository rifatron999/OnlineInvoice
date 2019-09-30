@extends('template.portal.user')
@section('title')
Oinvoice-Previous Invoices
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
                          <li><a  href="{{route('createinvoiceView.index')}}">Create New Invoice</a></li>
                          <li class="active" ><a  href="">Invoices and Quotation</a></li>
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
           
            <!-- Prevoius invoicelist table -->
             
<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                        <font size="4"  >
                          <table class="table table-striped  table-hover">
                            <h4 style="text-align:center;" > Previous Invoices and Quotation</h4>
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
                                  <td><a href="">{{$s->due_date}}</a></td>
                                  <td><a >{{$s->total}}</a></td>
                                  <td><a >@if($s->due_balance === 0)
                                   <mark style="background-color: green;color: white;" >  Paid  </mark>
                                          @elseif($s->invoice_type === "Quotation")
                                          <mark style="background-color: Yellow;color: black;" >  Quotation  </mark>
                                          @else
                                           <mark style="background-color: red;color: white;" >  {{$s->due_balance}} </mark>
                                          
                                          @endif

                                  </a></td>
                                                                   
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

      