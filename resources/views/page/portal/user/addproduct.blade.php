@extends('template.portal.user')
@section('title')
Oinvoice-Portal-AddProduct
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
                      <a class="active" href="{{route('addProductView.index')}}" >
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
           
            <!-- profile -->
            <form method="post">
           
             <div class="row mt">
              <div class="col-lg-12">
                


                          <div class="form-horizontal tasi-form" >
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
                              <div class="form-group "> <h3  align="center">Add Product</h3> <br>
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess"> Product Name</label>
                                  <div class="col-lg-10">
                                      <input name="product_name" placeholder="*Required"  type="text" class="form-control"  >
                                      <br>
                                  </div>


                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Product Description</label>
                                  <div class="col-lg-10">
                                      <input name="p_description" type="text" class="form-control"  >
                                      &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                      
                                      <br>
                                  </div>

                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Product Price</label>
                                  <div class="col-lg-10">
                                      <input name="p_price" type="number" class="form-controlss"  >
                                      &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                      
                                      <br>
                                  </div>

                                 

                                 
                                  <div class="col-lg-10">
                                      
                                      <br>
                                      <input class="btn btn-primary "  type="submit" name="submit" value="Add" style="display: block; margin: 0 auto;"/>
                                      
                                  </div>

</div>
                            </div>
                        </div>

                          
                     

              
              </div><!-- /col-lg-12 -->
            </div><!-- /row -->
          </form>
            <!-- /profile -->




            <!--productList table -->
<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4 style="text-align:center;" > My Products</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Id</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                                  <th><i class=""></i> Price</th>
                                  <th><i class=""></i> Description</th>
                                  <th><i class=" fa fa-edit"></i> Edit</th>
                                  <th><i class=" fa fa-edit"></i> Delete</th>
                                  <th></th>
                              </tr>
                              </thead>

                              <tbody>
                                 @foreach ($productList as $s) 
                              <tr>
                                  <td><a >{{$s->p_id}}</a></td>
                                  <td><a href="">{{$s->p_name}}</a></td>
                                  <td><a href="">{{$s->p_price}}</a></td>
                                  <td><a >{{$s->p_description}}</a></td>
                                                                   
                                  <td> <a href="{{route('productUpdateView',$s->p_id )}}" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></a></td>
                                  <td>
                                     
      
           <a class="btn btn-danger btn-xs" href="{{route('removeProduct',$s->p_id )}}" ><i class="fa fa-trash-o "></i></a>
            

        
                                      
                                      
                                  </td>
                              </tr>
                               @endforeach
                              
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
<!--/productList table -->
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
          @endsection

      