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
                                      document.getElementById("file-field").style.visibility = "hidden";
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
        {
            
            var markup = "<tr><td ><input name='invoiceItem' type='text' class='form-control'  placeholder='Description of service and product'  ></td><td><input  name='invoiceQuantity' type='number' class='form-controlssp'    ></td><td><input  name='invoiceRate' type='number' class='form-controlssp'    ></td><td><input  name='invoiceAmount' type='number' class='form-controlssp' disabled   ></td><td><input type='checkbox' name='record' class='form-controlssp' ></td></tr>";
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