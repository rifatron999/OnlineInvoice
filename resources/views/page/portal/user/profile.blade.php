@extends('template.portal.user')
@section('title')
Oinvoice-Portal-profile
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
                      <a class="active"  href="{{route('profileView.index')}}">
                          <i class="fa fa-user"></i>
                          <span>Profile</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-file"></i>
                          <span>Invoice</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
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
           
            <!-- profile -->
            <form method="post">
           
             <div class="row mt">
              <div class="col-lg-12">
                <div class="form-inline" >
                <div class="form-panel">
                      
                      
                          <div class="form-group"> <h3  align="center"> User Information</h3> <br>
                               Name: &nbsp
                              <input name="name" type="text" class="form-control"  placeholder="Name" value="{{session('name')}}">
                             &nbsp Password: &nbsp
                              <input name="password" type="password" class="form-control"  placeholder="Password" value="{{session('password')}}">
                              &nbsp Email: &nbsp
                              <input name="email"  type="Email" class="form-control"  placeholder="Email" value="{{session('email')}}" >
                             
                               &nbsp DOB: &nbsp
                              <input name="dob" type="date" class="form-control"  value="{{session('dob')}}" >
                              &nbsp Phone: &nbsp
                              <input name="phone" type="number" class="form-control" value="{{session('phone')}}" >
                              <br>
                              <br>
                               &nbsp Picture: &nbsp
                              <input name="picture" type="file" class="form-control" value="" />
                          </div>
                          <br>
                          </div><!-- /form-panel -->
                            </div>
                            <!--user information -->


                          <div class="form-horizontal tasi-form" >
                            <div class="form-panel">
                              <div class="form-group "> <h3  align="center"> Company Information</h3> <br>
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess"> Name</label>
                                  <div class="col-lg-10">
                                      <input name="c_name"  type="text" class="form-control" value="{{session('c_name')}}" >
                                      <br>
                                  </div>


                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess"> Address</label>
                                  <div class="col-lg-10">
                                      <input name="c_address" type="text" class="form-control" value="{{session('c_address')}}" >
                                      <br>
                                  </div>

                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess"> Email</label>
                                  <div class="col-lg-10">
                                      <input name="c_phone" type="text" class="form-control" value="{{session('c_phone')}}" >
                                      <br>
                                  </div>

                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess"> Phone</label>
                                  <div class="col-lg-10">
                                      <input name="c_email" type="text" class="form-control"  value="{{session('c_email')}}">
                                      <br>
                                      <input class="btn btn-primary "  type="submit" name="submit" value="Update" style="display: block; margin: 0 auto;"/>
                                      
                                  </div>

</div>
                            </div>
                        </div>

                          
                     

              
              </div><!-- /col-lg-12 -->
            </div><!-- /row -->
          </form>
            <!-- /profile -->
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
          @endsection

      