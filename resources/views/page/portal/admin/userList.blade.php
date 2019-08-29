@extends('template.portal.user')
@section('title')
Oinvoice-Portal-UserList
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
                      <a  href="{{route('portal.index')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active"  href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>User Access Control</span>
                      </a>
                      <ul class="sub">
                         
                          <li class="active"  ><a  href="{{route('userListViewA.index')}}">View Users</a></li>
                          
                      </ul>
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

             <font color="red">
        @foreach($errors->all() as $err)
  ⚠️{{$err}} <br>
@endforeach

<div>
    {{session('msg')}}
  </div>
</font>
            
<!--userList table -->
<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4 style="text-align:center;" > USER LIST</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Id</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                                  <th><i class=""></i> DOB</th>
                                  <th><i class=" "></i> Gender</th>
                                  <th><i class=" "></i> Email</th>
                                  <th><i class=" "></i> Phone</th>
                                  <th><i class=" "></i> Products</th>
                                  <th><i class=" fa fa-edit"></i> BAN</th>
                                  <th></th>
                              </tr>
                              </thead>

                              <tbody>
                                 @foreach ($userList as $s) 
                              <tr>
                                  <td><a >{{$s->id}}</a></td>
                                  <td><a href="">{{$s->name}}</a></td>
                                  <td><a >{{$s->dob}}</a></td>
                                  <td><a >{{$s->gender}}</a></td>
                                  <td><a >{{$s->email}}</a></td>
                                  <td><a >{{$s->phone}}</a></td>
                                  
                                  <td> <button class="btn btn-danger btn-xs">➠</button></td>
                                  <td>
                                     
      
           <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
            

        
                                      
                                      
                                  </td>
                              </tr>
                               @endforeach
                              
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
<!--/userList table -->
            




 




      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
          @endsection

      