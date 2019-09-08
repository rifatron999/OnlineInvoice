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

var i=0;


    $(document).ready(function()
    {
      
        $("#add-row").click(function()
        {
            i++;
            var markup = "<tr><td ><input  name='invoiceItem[]' type='text' class='form-control'  placeholder='Description of service and product'  ></td><td><input id='quantity_"+i+"' name='invoiceQuantity[]' type='number' onkeyup='amountCal("+i+")' class='form-controlssp'    ></td><td><input id='rate_"+i+"' onkeyup='amountCal("+i+")' name='invoiceRate[]' type='number' class='form-controlssp'    ></td><td><input id='amount_"+i+"' name='invoiceAmount[]' type='number' class='form-controlssp' readonly='readonly'    ></td><td><input type='checkbox' name='record' class='form-controlssp' ></td></tr>";
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

                 //### product add in create ###                   
  //#############################################################################




//*** discount tax shipping  ***




    $(document).ready(function(){

  

  $("#discount").click(function(){
    $("#next").after('<div id="d"> <input  name="discountx" type="text" class="form-controlss"  placeholder="Discount" value="Discount" > <input  id="discount"  name="discount" type="text" class="form-controls"  onkeyup="totalCal()" >  <br></div>');
    $(this).hide();
  });

  $("#tax").click(function(){
    $("#next").after('<br> <input  name="taxx" type="text" class="form-controlss"  placeholder="Tax" value="Tax" > <input  id="tax" name="tax" type="text" class="form-controls" onkeyup="totalCal()"  ><br>');
    $(this).hide();
  });



  $("#Shipping").click(function(){
    $("#next").after('<br> <input  name="shippingx" type="text" class="form-controlss"  placeholder="Shipping" value="Shipping"  >   <input id="shipping" name="shipping" type="text" class="form-controls" onkeyup="totalCal()"   ><br>');
    $(this).hide();
  });


  
});

                 //### product add in create ###                   
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

                var amountTotal = 0;
                var j;
                for (j = 0; j < i+1; j++) 
                {  
                   amountTotal += parseInt(document.getElementById('amount_'+j).value);
                  

  
                }
                document.getElementById('subTotal').value = amountTotal; //subtotal from amount
                totalCal();
          }
} 



function totalCal() 
{
  
        var tax = $('#tax').val();
        var shipping = $('#shipping').val();
        var discount = $('#discount').val();

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
            }
        else
            { 
              document.getElementById('total').value = $('#subTotal').val() ;
            }

                
            
} 