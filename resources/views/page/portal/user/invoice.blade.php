<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Oinvoice-{{$req->invoice_No}}</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
         font-size: 20px;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }

    


</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><!-- <img  src="{{asset('assets/img/company_logo')}}/{{session('c_logo')}}" width="200" height="250">  --> <img  src="assets/img/company_logo/{{session('c_logo')}}" width="200" height="250"></td>
        <td align="right">
            <h2> {{$req->invoice_option}} #{{$req->invoice_No}}</h2>
            <h3>{{session('c_name')}}</h3>
            <pre>
                {{session('name')}}
                {{session('c_address')}}
                {{session('c_phone')}}
                {{session('c_email')}}
                
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>{{$req->billfrom}}:</strong> {{$req->invoiceFrom}}</td>
      </tr>
      <tr>
        <td><strong>{{$req->billto}}:</strong> {{$req->invoiceTo}}</td>
        
        <td align="right" >
          <strong>{{$req->datex}}:</strong> {{$req->date}} <br>
          <strong>{{$req->duedatex}}:</strong> {{$req->duedate}} <br>
          <strong  >{{$req->duebanalcex}}:</strong> <span class="gray" >{{$req->duebanalce}}</span> 

        </td>

        
          
        
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: #464f47; color: #fff;">
      <tr align="center" >
        
        <th>ITEM</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>

      <?php for($x=0;$x<count($req->invoiceItem);$x++)
{
  ?>
      <tr>
        
        <td align="center">{{$req->invoiceItem[$x]}}</td>
        <td align="center">{{$req->invoiceQuantity[$x]}}</td>
        <td align="center">{{$req->invoiceRate[$x]}}</td>
        <td align="center">{{$req->invoiceAmount[$x]}}</td>
      </tr>

      <?php
      }
  ?>
      
      
    </tbody>
     </table>

    <table align="right"  width="30%" >
      
        <tr>
           
            <td align="center">{{$req->subTotalx}}</td>
            <td align="center">{{$req->subTotal}}</td>
        </tr>
        <tr>
            
            <td align="center">{{$req->taxx}}</td>
            <td align="center">{{$req->tax}}</td>
        </tr>
        <tr>
            
            <td align="center">{{$req->shippingx}}</td>
            <td align="center">{{$req->shipping}}</td>
        </tr>

        <tr>
            
            <td align="center">{{$req->discountx}}</td>
            <td align="center">{{$req->discount}}</td>
        </tr>
        <tr>
           
            <td align="center">{{$req->totalx}}</td>
            <td align="center" class="gray">{{$req->total}}</td>
        </tr>

        <tr>
           
            <td align="center">{{$req->paidx}}</td>
            <td align="center" class="gray">{{$req->paid}}</td>
        </tr>
<hr width="70%" align="left" >


        
    <table align="left"  width="70%"  >
    
      
        <tr>
           
            <td align="left" style="color: #a0aec0;"width="20%" >{{$req->descriptionx}}: </td>
            <td align="left"  style=" color: #fbd38d;">{{$req->description}}</td>
        </tr>
        <tr>
           
            <td align="left" style="color: #a0aec0;"width="20%" >{{$req->termsx}}: </td>
            <td align="left"  style=" color: #fbd38d;">{{$req->terms}}</td>
        </tr>
    </table>
  

</body>
</html>