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
              
                  <p class="centered"><a href="profile.html"><img src="{{asset('assets/img/user_picture')}}/{{session('picture')}}" class="img-circle" width="60"></a></p>
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
           
            <!-- profile -->
            <
            <form method="post" enctype="multipart/form-data">
           
             <div class="row mt">
              <div class="col-lg-12">
                <div class="form-inline" >
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
                              <input name="picture" type="file" class="form-control" value="C:\Xampp\htdocs\Online Invoice\onlineInvoice\public\assets\img\user_picture\{{session('picture')}}"  />
                              <!-- currency -->

                                  <select name="currencies" class="form-controls" >
<option selected value="">Select currency</option>
<option value="USD">America (United States) Dollars – USD</option>
<option value="AFN">Afghanistan Afghanis – AFN</option>
<option value="ALL">Albania Leke – ALL</option>
<option value="DZD">Algeria Dinars – DZD</option>
<option value="ARS">Argentina Pesos – ARS</option>
<option value="AUD">Australia Dollars – AUD</option>
<option value="ATS">Austria Schillings – ATS</OPTION>
 
<option value="BSD">Bahamas Dollars – BSD</option>
<option value="BHD">Bahrain Dinars – BHD</option>
<option value="BDT">Bangladesh Taka – BDT</option>
<option value="BBD">Barbados Dollars – BBD</option>
<option value="BEF">Belgium Francs – BEF</OPTION>
<option value="BMD">Bermuda Dollars – BMD</option>
 
<option value="BRL">Brazil Reais – BRL</option>
<option value="BGN">Bulgaria Leva – BGN</option>
<option value="CAD">Canada Dollars – CAD</option>
<option value="XOF">CFA BCEAO Francs – XOF</option>
<option value="CFA BEAC Francs - XAF">CFA BEAC Francs – XAF</option>
<option value="Chile Pesos - CLP">Chile Pesos – CLP</option>
 
<option value="China Yuan Renminbi - CNY">China Yuan Renminbi – CNY</option>
<option value="RMB (China Yuan Renminbi) - CNY">RMB (China Yuan Renminbi) – CNY</option>
<option value="Colombia Pesos - COP">Colombia Pesos – COP</option>
<option value="CFP Francs - XPF">CFP Francs – XPF</option>
<option value="Costa Rica Colones - CRC">Costa Rica Colones – CRC</option>
<option value="Croatia Kuna - HRK">Croatia Kuna – HRK</option>
 
<option value="Cyprus Pounds - CYP">Cyprus Pounds – CYP</option>
<option value="Czech Republic Koruny - CZK">Czech Republic Koruny – CZK</option>
<option value="Denmark Kroner - DKK">Denmark Kroner – DKK</option>
<option value="Deutsche (Germany) Marks - DEM">Deutsche (Germany) Marks – DEM</OPTION>
<option value="Dominican Republic Pesos - DOP">Dominican Republic Pesos – DOP</option>
<option value="Dutch (Netherlands) Guilders - NLG">Dutch (Netherlands) Guilders – NLG</OPTION>
 
<option value="Eastern Caribbean Dollars - XCD">Eastern Caribbean Dollars – XCD</option>
<option value="Egypt Pounds - EGP">Egypt Pounds – EGP</option>
<option value="Estonia Krooni - EEK">Estonia Krooni – EEK</option>
<option value="Euro - EUR">Euro – EUR</option>
<option value="Fiji Dollars - FJD">Fiji Dollars – FJD</option>
<option value="Finland Markkaa - FIM">Finland Markkaa – FIM</OPTION>
 
<option value="France Francs - FRF*">France Francs – FRF*</OPTION>
<option value="Germany Deutsche Marks - DEM">Germany Deutsche Marks – DEM</OPTION>
<option value="Gold Ounces - XAU">Gold Ounces – XAU</option>
<option value="Greece Drachmae - GRD">Greece Drachmae – GRD</OPTION>
<option value="Guatemalan Quetzal - GTQ">Guatemalan Quetzal – GTQ</OPTION>
<option value="Holland (Netherlands) Guilders - NLG">Holland (Netherlands) Guilders – NLG</OPTION>
<option value="Hong Kong Dollars - HKD">Hong Kong Dollars – HKD</option>
 
<option value="Hungary Forint - HUF">Hungary Forint – HUF</option>
<option value="Iceland Kronur - ISK">Iceland Kronur – ISK</option>
<option value="IMF Special Drawing Right - XDR">IMF Special Drawing Right – XDR</option>
<option value="India Rupees - INR">India Rupees – INR</option>
<option value="Indonesia Rupiahs - IDR">Indonesia Rupiahs – IDR</option>
<option value="Iran Rials - IRR">Iran Rials – IRR</option>
 
<option value="Iraq Dinars - IQD">Iraq Dinars – IQD</option>
<option value="Ireland Pounds - IEP*">Ireland Pounds – IEP*</OPTION>
<option value="Israel New Shekels - ILS">Israel New Shekels – ILS</option>
<option value="Italy Lire - ITL*">Italy Lire – ITL*</OPTION>
<option value="Jamaica Dollars - JMD">Jamaica Dollars – JMD</option>
<option value="Japan Yen - JPY">Japan Yen – JPY</option>
 
<option value="Jordan Dinars - JOD">Jordan Dinars – JOD</option>
<option value="Kenya Shillings - KES">Kenya Shillings – KES</option>
<option value="Korea (South) Won - KRW">Korea (South) Won – KRW</option>
<option value="Kuwait Dinars - KWD">Kuwait Dinars – KWD</option>
<option value="Lebanon Pounds - LBP">Lebanon Pounds – LBP</option>
<option value="Luxembourg Francs - LUF">Luxembourg Francs – LUF</OPTION>
 
<option value="Malaysia Ringgits - MYR">Malaysia Ringgits – MYR</option>
<option value="Malta Liri - MTL">Malta Liri – MTL</option>
<option value="Mauritius Rupees - MUR">Mauritius Rupees – MUR</option>
<option value="Mexico Pesos - MXN">Mexico Pesos – MXN</option>
<option value="Morocco Dirhams - MAD">Morocco Dirhams – MAD</option>
<option value="Netherlands Guilders - NLG">Netherlands Guilders – NLG</OPTION>
 
<option value="New Zealand Dollars - NZD">New Zealand Dollars – NZD</option>
<option value="Norway Kroner - NOK">Norway Kroner – NOK</option>
<option value="Oman Rials - OMR">Oman Rials – OMR</option>
<option value="Pakistan Rupees - PKR">Pakistan Rupees – PKR</option>
<option value="Palladium Ounces - XPD">Palladium Ounces – XPD</option>
<option value="Peru Nuevos Soles - PEN">Peru Nuevos Soles – PEN</option>
 
<option value="Philippines Pesos - PHP">Philippines Pesos – PHP</option>
<option value="Platinum Ounces - XPT">Platinum Ounces – XPT</option>
<option value="Poland Zlotych - PLN">Poland Zlotych – PLN</option>
<option value="Portugal Escudos - PTE">Portugal Escudos – PTE</OPTION>
<option value="Qatar Riyals - QAR">Qatar Riyals – QAR</option>
<option value="Romania New Lei - RON">Romania New Lei – RON</option>
 
<option value="Romania Lei - ROL">Romania Lei – ROL</option>
<option value="Russia Rubles - RUB">Russia Rubles – RUB</option>
<option value="Saudi Arabia Riyals - SAR">Saudi Arabia Riyals – SAR</option>
<option value="Silver Ounces - XAG">Silver Ounces – XAG</option>
<option value="Singapore Dollars - SGD">Singapore Dollars – SGD</option>
<option value="Slovakia Koruny - SKK">Slovakia Koruny – SKK</option>
 
<option value="Slovenia Tolars - SIT">Slovenia Tolars – SIT</option>
<option value="South Africa Rand - ZAR">South Africa Rand – ZAR</option>
<option value="South Korea Won - KRW">South Korea Won – KRW</option>
<option value="Spain Pesetas - ESP">Spain Pesetas – ESP</OPTION>
<option value="Special Drawing Rights (IMF) - XDR">Special Drawing Rights (IMF) – XDR</option>
<option value="Sri Lanka Rupees - LKR">Sri Lanka Rupees – LKR</option>
 
<option value="Sudan Dinars - SDD">Sudan Dinars – SDD</option>
<option value="Sweden Kronor - SEK">Sweden Kronor – SEK</option>
<option value="Switzerland Francs - CHF">Switzerland Francs – CHF</option>
<option value="Taiwan New Dollars - TWD">Taiwan New Dollars – TWD</option>
<option value="Thailand Baht - THB">Thailand Baht – THB</option>
<option value="Trinidad and Tobago Dollars - TTD">Trinidad and Tobago Dollars – TTD</option>
 
<option value="Tunisia Dinars - TND">Tunisia Dinars – TND</option>
<option value="Turkey New Lira - TRY">Turkey New Lira – TRY</option>
<option value="United Arab Emirates Dirhams - AED">United Arab Emirates Dirhams – AED</option>
<option value="United Kingdom Pounds - GBP">United Kingdom Pounds – GBP</option>
<option value="United States Dollars - USD">United States Dollars – USD</option>
<option value="Venezuela Bolivares - VEB">Venezuela Bolivares – VEB</option>
 
<option value="Vietnam Dong - VND">Vietnam Dong – VND</option>
<option value="Zambia Kwacha - ZMK">Zambia Kwacha – ZMK</option>
</select>

                              <!-- /currency -->
                          </div>
                          <br>
                          </div><!-- /form-panel -->
                            </div>
                            <!--user information -->


                          <div class="form-horizontal tasi-form" >
                            <div class="form-panel">
                              <div class="form-group "> <h3  align="center"> Company Information</h3> <br>

                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess"> Logo</label>
                                  <div class="col-lg-10" align="left">
                                     <img   width="200" height="250" id="image-field" style="visibility: visible;" src="{{asset('assets/img/company_logo')}}/{{session('c_logo')}}" >
                                      <input name="company_logo"  type="file" class="form-controls" id="file-field"  onchange="previewImage(event)">
                                      
                                      <br>
                                  </div>
                                  
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

      