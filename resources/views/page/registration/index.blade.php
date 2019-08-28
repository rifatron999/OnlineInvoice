@extends('template.unsigned.index')
@section('unsigned')
	  <div id="login-page">
	  	<div class="container">
	  	
		      
		        
		        <div class="login-wrap">
		        	<form method="post" class="form-login"  >
		        		<h2 class="form-login-heading">sign up now</h2>
		           
		            <input type="text" class="form-control" placeholder="User Name*" name="name" autofocus>
		            <br>

		            <input type="date" class="form-control" placeholder="DOB* " name="dob" autofocus  >
		            <br>
		             <select class="form-control" name="gender" >
  <option value="male"  >Male</option>
  <option value="female"  >Female</option>
  
              </select  >
		            <br>

		            <input type="email" class="form-control" placeholder="Email Address*" name="email" autofocus>
		            <br>

		            <input type="number" class="form-control" placeholder="Contact number*" name="phone" autofocus>
		            <br>


		            <input type="password" class="form-control" placeholder="Password*" name="password" >
		            <br>
		            <input type="password" class="form-control" placeholder="Confirm Password*" name="cpassword" >
		            <label class="checkbox">
		                <!-- <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span> -->
		            </label>
		          
		            <input class="btn btn-theme btn-block" type="submit" name="submit" value="SIGN UP" />
		            <hr>
		            </form>
		            
		            <!-- <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div> -->
		            <div class="registration">
		                Already have an account ?<br/>
		                <a class="" href="{{route('login.index')}}">
		                   Sign in
		                </a>
		            </div>
		
		        </div>
		         
		
		          <!-- Modal -->
		          <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div> -->
		          <!-- modal -->
		
		     	  	
	  	
	  	</div>
	  </div>
	  @endsection
