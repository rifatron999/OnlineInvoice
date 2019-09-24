var i=0;
//#################################################################
function previewImage(event)
                                    {
                                      var reader = new FileReader();
                                      var imageField = document.getElementById("image-field")
                                      reader.onload = function()
                                      {
                                        if(reader.readyState == 2)
                                        {
                                          imageField.src = reader.result;
                                        }
                                      }
                                      reader.readAsDataURL(event.target.files[0]);
                                      
                                      document.getElementById("image-field").style.visibility = "visible";
                                    }


  //##########################################################

 function getDate() {
  let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;

}


window.onload = function() {
  getDate();
};
//#########################################################################

//*** product add in create ***




    $(document).ready(function()
    {
      
        $("#add-row").click(function()
        { //off now
            i++;
            var markup = "<tr><td ><input  list='productList' name='invoiceItem[]' type='text' class='form-control'  placeholder='Description of service and product' autocomplete='off' ></td><td><input id='quantity_"+i+"' name='invoiceQuantity[]' type='number' onkeyup='amountCal("+i+")' class='form-controlssp quantity'    ></td><td><input id='rate_"+i+"' onkeyup='amountCal("+i+")' name='invoiceRate[]' type='number' class='form-controlssp rate'    ></td><td><input id='amount_"+i+"' name='invoiceAmount[]' type='number' class='form-controlssp amount' readonly='readonly'    ></td><td><input type='checkbox' name='record' class='form-controlssp' ></td></tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $("#delete-row").click(function()
        {
            $("table tbody").find('input[name="record"]').each(function(){
              if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });



        
    });    

                                
  //#############################################################################




function addRow(size) 
{ 
             i++;
             var s = parseInt(size) + parseInt(i);
             //alert(s);
            var markup = "<tr><td ><input  list='productList' name='invoiceItem[]' type='text' class='form-control'  placeholder='Description of service and product' autocomplete='off' ></td><td><input id='quantity_"+s+"' name='invoiceQuantity[]' type='number' onkeyup='amountCal("+s+")' class='form-controlssp quantity'    ></td><td><input id='rate_"+s+"' onkeyup='amountCal("+s+")' name='invoiceRate[]' type='number' class='form-controlssp rate'    ></td><td><input id='amount_"+s+"' name='invoiceAmount[]' type='number' class='form-controlssp amount' readonly='readonly'    ></td><td><input type='checkbox' name='record' class='form-controlssp' ></td></tr>";
            $("table tbody").append(markup);
} 


//#################################################################################

    $(document).ready(function(){

  //### product add in create ###  
  //*** discount tax shipping  ***  

  $("#discountadd").click(function(){
    $("#next").after('<div id="d"> <input  name="discountx" type="text" class="form-controlss"  placeholder="Discount" value="Discount (%)" > <input  id="discount"  name="discount" type="text" class="form-controls"  onkeyup="discountcal()" >  <br></div>');
    $(this).hide();
  });

  $("#taxadd").click(function(){
    $("#next").after('<br> <input  name="taxx" type="text" class="form-controlss"  placeholder="Tax" value="Tax (%)" > <input  id="tax" name="tax" type="text" class="form-controls" onkeyup="taxcal()"  ><br>');
    $(this).hide();
  });



  $("#Shippingadd").click(function(){
    $("#next").after('<br> <input  name="shippingx" type="text" class="form-controlss"  placeholder="Shipping" value="Shipping"  >   <input id="shipping" name="shipping" type="text" class="form-controls" onkeyup="totalCal()"   ><br>');
    $(this).hide();
  });



  //### product add in create ###  
  //*** Ajax Search Product ***
  




  //### Ajax Search Product ###


  
});








    

                                  
  //#############################################################################

  //*** row calc ***




       



   /* $(document).on('keyup', '#rate,#quantity', function()
    {
    
            var num1 = document.getElementById('quantity').value;
            var num2 = document.getElementById('rate').value;
            var result = parseInt(num1) * parseInt(num2);
     
            if (!isNaN(result)) 
            {
                document.getElementById('amount').value = result;

            }
  });*/

                 //### row calc ###  




//##############################################
 



function amountCal(i) 
{
            var num1 = $('#quantity_'+i).val();
            var num2 = $('#rate_'+i).val();
            var result = parseInt(num1) * parseInt(num2);
     
            if (!isNaN(result)) 
            {
                document.getElementById('amount_'+i).value = result;

                /*var amountTotal = 0;
                var j;
                for (j = 0; j < i+1; j++) 
                {  
                   amountTotal += parseInt(document.getElementById('amount_'+j).value);
                }
                //document.getElementById('subTotal').value = amountTotal; //subtotal from amount
                totalCal();*/
          }
}

var discount;
var tax;

function discountcal()
{

   var discountp = $('#discount').val()/100;
   discount = $('#subTotal').val()*discountp;
   totalCal();
} 
function taxcal()
{
   var taxp = $('#tax').val()/100;
    tax = $('#total').val()*taxp;
   totalCal();
} 



function totalCal() 
{
        var shipping = $('#shipping').val();
        /*var taxp = $('#tax').val()/100;
        var tax = $('#total').val()*taxp;*/

        // var discountp = $('#discount').val()/100;
        // var discount = $('#subTotal').val()*discountp;
        //var discount = $('#discount').val();

         if (!tax) 
            {
              tax=0;
            }
          if (!shipping ) 
            {
              shipping=0;
            }
          if (!discount) 
            {
              discount=0;
            }

        var result2 = parseInt($('#subTotal').val()) + parseInt(tax) + parseInt(shipping) - parseInt(discount)  ;
            
        if (!isNaN(result2)) 
            {
              document.getElementById('total').value = result2 ;
              dueCal();
            }
        else
            { 
              document.getElementById('total').value = $('#subTotal').val() ;
            }

                
            
}



function dueCal() 
{
            var num1 = $('#total').val();
            var num2 = $('#paid').val();
            
            var result3 = parseInt(num1) - parseInt(num2);
     
            if (!isNaN(result3)) 
            {
                document.getElementById('duebalance').value = result3;
            }
            else
            {
              document.getElementById('duebalance').value = document.getElementById('total').value;
            }
}



$(document).on("keyup", ".rate,.quantity", function() 
{ 
    var sum = 0;
    $(".amount").each(function(){
        sum += +$(this).val();
    });
    $("#subTotal").val(sum);
    totalCal();
});






 





