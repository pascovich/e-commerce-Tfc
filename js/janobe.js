   
/*
 * for adding a quantity to the cart
 *using jquery
 * Copyright (c) Janno Palacios 
 * Dual licensed under the MIT and GPL licenses.
 */

 
$(document).on("keyup", ".QTY", function () {
   var productid = $(this).data('id');
  // alert(productid);

    var qty = document.getElementById('QTY'+productid); 
    var originalqty =  document.getElementById('ORIGQTY'+productid);
    var price =  document.getElementById('PROPRICE'+productid);
    var subtot;

    // alert(qty);

 if (parseInt(originalqty.value)<=parseInt(qty.value)){

  alert("The quantity that you put is greater than the availabe quantity of the product.");
  document.getElementById('QTY'+productid).value = originalqty.value;

    subtot = parseFloat(price) * parseFloat(originalqty.value);

} else{
   subtot = parseFloat(price.value) * parseFloat(qty.value);
}

subtot = parseFloat(price.value) * parseFloat(qty.value);

 // alert(subtot.toFixed(2))
 
  // $.ajax({    //create an ajax request to load_page.php
  //       type:"GET",
  //       url: "cart.php?QTY"+productid+"="+ qty + "&subTOT"+productid+"=" +  subtot.toFixed(2),             
  //       dataType: "text",   //expect html to be returned  
  //       data:{updateid:productid},               
  //       success: function(data){                    
  //           $("#CART").html(data); 
  //          // alert(data);
            
  //       }

  //   });

 


    document.getElementById('TOT'+productid).value = subtot.toFixed(2);
    document.getElementById('Osubtot'+productid).value  =  document.getElementById('TOT'+productid).value;

    var table = document.getElementById('table');
    var items = table.getElementsByTagName('output');

    var sum = 0;
    for(var i=0; i<items.length; i++)
        sum +=   parseFloat(items[i].value);

    var output = document.getElementById('sum');
    output.innerHTML =  sum.toFixed(2);

    // $(".modal-body #tabledata").val( p_id );

    $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "cart/controller.php?action=edit&QTY"+productid+"="+ qty.value + "&TOT"+productid+"=" + subtot.toFixed(2),             
        dataType: "text",   //expect html to be returned  
        data:{UPPROID:productid},               
        success: function(data){                    
            // $("#cartLi").html(data); 
            // alert(data)
 
            
        }

      });

    });


 
$(document).on("change", ".QTY", function () { 
   var productid = $(this).data('id');
   // alert(productid);

    var qty = document.getElementById('QTY'+productid); 
    var originalqty =  document.getElementById('ORIGQTY'+productid);
    var price =  document.getElementById('PROPRICE'+productid);
    var subtot;

    // alert(qty);

 if (parseInt(originalqty.value)<=parseInt(qty.value)){

  alert("The quantity that you put is greater that the availabe quantity of the product.");
  document.getElementById('QTY'+productid).value = originalqty.value;

    subtot = parseFloat(price) * parseFloat(originalqty.value);

} else{
   subtot = parseFloat(price.value) * parseFloat(qty.value);
}

subtot = parseFloat(price.value) * parseFloat(qty.value);
 
 
  $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "cart/controller.php?action=edit&QTY"+productid+"="+ qty.value + "&TOT"+productid+"=" + subtot.toFixed(2),             
        dataType: "text",   //expect html to be returned  
        data:{UPPROID:productid},               
        success: function(data){                    
            // $("#cartLi").html(data); 
            // alert(data)
 
            
        }

    });
 

    document.getElementById('TOT'+productid).value = subtot.toFixed(2);
    document.getElementById('Osubtot'+productid).value  =  document.getElementById('TOT'+productid).value;

    var table = document.getElementById('table');
    var items = table.getElementsByTagName('output');

    var sum = 0;
    for(var i=0; i<items.length; i++)
        sum +=   parseFloat(items[i].value);

    var output = document.getElementById('sum');
    output.innerHTML =  sum.toFixed(2);
 
});



// $(document).on("load_page", ".QTY", function () { 
//    var productid = $(this).data('id');
  
 
// });



 function totalprice() {
var table = document.getElementById('table');
      var items = table.getElementsByTagName('output');

      var sum = 0;
      for(var i=0; i<items.length; i++)
        sum +=   parseFloat(items[i].value);

      var output = document.getElementById('sum');
      output.innerHTML =  sum.toFixed(2); 

    var deliveryfee = document.getElementById('deliveryfee').value;
    var pickupfee = document.getElementById('pickupfee').value;
    var fee = 0.00
         // alert(paymethod);
     if (deliveryfee.checked==true){
          document.getElementById('fee').innerHTML =  document.getElementById('BRGY').value;

     }else if (pickupfee.checked==true){
         document.getElementById('fee').innerHTML = 0.0;

     }

    // over all price
    var overall = 0;
   
    overall = sum + parseFloat(fee);

    var overallprice = document.getElementById('overall');

    overallprice.innerHTML = overall.toFixed(2); 

    document.getElementById("alltot").value = overallprice.innerHTML ;


 }


// for paymethod

 $(document).on("click",".paymethod", function(){


 // alert(delfee.value);
var table = document.getElementById('table');
      var items = table.getElementsByTagName('output');

      var sum = 0;
      for(var i=0; i<items.length; i++)
        sum +=   parseFloat(items[i].value);

      var output = document.getElementById('sum');
      output.innerHTML =  sum.toFixed(2); 



    var deliveryfee = document.getElementById('deliveryfee') ;

     var pickupfee = document.getElementById('pickupfee') ;

       var delfee = document.getElementById('PLACE');
// alert(delfee.value);
    var fee = delfee.value;
         // alert(paymethod);
     if (deliveryfee.checked==true){
        document.getElementById('fee').innerHTML = delfee.value;
     }else if (pickupfee.checked==true){
         document.getElementById('fee').innerHTML = 0.0;
     }

    // over all price
    var overall = 0;
    

    overall = sum + parseFloat(fee);

    var overallprice = document.getElementById('overall');

    overallprice.innerHTML = overall.toFixed(2); 

    document.getElementById("alltot").value = overallprice.innerHTML ;
 


 });



// end/...............


// VALIDATE CUSTOMER

 // Validates Personal Info
   $(document).on("click", ".submit", function () { 

  
        var FNAME=document.forms["personal"]["FNAME"];
        var LNAME=document.forms["personal"]["LNAME"];
        var MNANE=document.forms["personal"]["MNAME"];
        var CUSHOMENUM=document.forms["personal"]["CUSHOMENUM"];
        var STREETADD=document.forms["personal"]["STREETADD"];
        var BRGYADD=document.forms["personal"]["BRGYADD"];
        var CITYADD=document.forms["personal"]["CITYADD"];
        var PROVINCE=document.forms["personal"]["PROVINCE"];
        var COUNTRY=document.forms["personal"]["COUNTRY"]; 
        var PHONE=document.forms["personal"]["PHONE"]; 
        var ZIPCODE=document.forms["personal"]["ZIPCODE"]; 
        var CUSUNAME=document.forms["personal"]["CUSUNAME"]; 
        var CUSPASS=document.forms["personal"]["CUSPASS"]; 
        var CUSPHOTO=document.forms["personal"]["image"];


        if(FNAME.value==""){
           alert("Firstname is required!");
             return false;
        }
        if(LNAME.value=="") {
           alert("Lastname is required!");
             return false;
        }

        if(CITYADD.value=="") {
           alert("Complete Address is required!");
             return false;
        }


        // if(CUSHOMENUM.value=="" || STREETADD.value=="" || BRGYADD.value=="" || CITYADD.value=="" || PROVINCE.value==""  || COUNTRY.value==""){
        //     alert("Complete Address is required!");
        //      return false;
        // }

        if(PHONE.value==""){
             alert("Contact number is required!");
             return false;
        }
        // if(ZIPCODE.value==""){
        //   alert("Zip Code is required!");
        //      return false;
        // }
        if (CUSUNAME.value=="") {
          alert("Username is required!");
             return false;
        };

        //  if (CUSPHOTO.value=="") {
        //   alert("Picture is required!");
        //      return false;
        // };



        var passw=  /^[A-Za-z]\w{7,14}$/;  
        // var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;



        if(!CUSPASS.value.match(passw)) {     
        alert(' Password must be atleast 8 to 15 characters. Only letter, numeric digits, underscore and first character must be a letter.')  ;
        return false;  
        } 
        if (document.personal.conditionterms.checked == false)
        {
        alert ('pls. agree the term and condition!');
        return false;
        }

      // $.ajax({    //create an ajax request to load_page.php
        //     type:"POST",
        //     url: "customer/controller.php?action=add",             
        //     dataType: "text",   //expect html to be returned  
        //     data:{

        //         button:"button",
        //         FNAME:FNAME.value,
        //         // LNAME:document.forms["personal"]["LNAME"].value,
        //         // MNANE:document.forms["personal"]["MNAME"].value,
        //         // GENDER:document.forms["personal"]["GENDER"].value,
        //         // CUSHOMENUM:document.forms["personal"]["CUSHOMENUM"].value,
        //         // STREETADD:document.forms["personal"]["STREETADD"].value,
        //         // BRGYADD:document.forms["personal"]["BRGYADD"].value,
        //         // CITYADD:document.forms["personal"]["CITYADD"].value,
        //         // PROVINCE:document.forms["personal"]["PROVINCE"].value,
        //         // COUNTRY:document.forms["personal"]["COUNTRY"].value, 
        //         // PHONE:document.forms["personal"]["PHONE"].value,
        //         // ZIPCODE:document.forms["personal"]["ZIPCODE"].value,
        //         // CUSUNAME:document.forms["personal"]["CUSUNAME"].value, 
        //         // CUSPASS:document.forms["personal"]["CUSPASS"].value, 
        //         // image:document.forms["personal"]["image"].value
        //      },               
        //     success: function(data){                    
        //         $("#smyModal").html(data); 
        //         // alert(data); 

        //     }

        // });
        });



// for view specific product in a modal-body
$(document).on("click", ".PHOTO", function () {

  var PROID = $(this).data('id');
  // alert(PROID);
   // $(".modal-body #cusid").val( cusid )

    $.ajax({    //create an ajax request to load_page.php
        type:"POST",  
        url: "viewProduct.php",    
        dataType: "text",   //expect html to be returned  
        data:{PROID:PROID},               
        success: function(data){                    
          $("#photoModal").html(data); 
              // alert(data);
        }

    }); 
});
// end viewing.................................
   // viewing orer
 $(document).on("click", ".orderid", function () {
   var p_id = $(this).data('id');
   // alert(p_id);
    // $(".modal-body #tabledata").val( p_id );
 
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "customer/listorderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{ordernumber:p_id},               
        success: function(data){                    
            $("#myOrdered").html(data); 
            // alert(data);
            
        }

    });
 
   
});


// end viewing.................................


$(document).on("click", "#btn_close" , function () {
 
   // alert('get');
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "viewProduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{close:"close"},               
        success: function(data){                    
            
            // alert("closing");
            
              
        }

    });
 
   
});

   // viewing orer
//  $(document).on("click", ".unsetmsg", function () {
//    var SUMID = $(this).data('id');
//    alert(SUMID);
//     // $(".modal-body #tabledata").val( p_id );
 
//       $.ajax({    //create an ajax request to load_page.php
//         type:"POST",
//         url: "cart/controller.php?action=unsetmsg",             
//         dataType: "text",   //expect html to be returned  
//         data:{summaryid:SUMID},               
//         success: function(data){                    
//             $("#myOrdered").html(data); 
//             alert(data);
            
//         }

//     });
 
   
// });
// end viewing.................................






$(document).on("click", ".confirm" , function () {
   var confirm = $(this).data('id');
   // alert(confirm);
    // // $(".modal-body #tabledata").val( p_id );

  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{id:confirm,actions:"confirm"},               
        success: function(data){                    
            // $("#status").html(data); 
        $("#myModal").html(data) ;
                      // alert(data);
        }

    });
 
   
});

$(document).on("click", ".cancel" , function () {
   var cancel = $(this).data('id');
   // alert(cancel);
    // // $(".modal-body #tabledata").val( p_id );

  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{id:cancel,actions:"cancel"},               
        success: function(data){                    
            // $("#status").html(data); 
            // alert(data);
             $("#myModal").html(data) ;
              
        }

    });
 
   
});




   
 $(document).on("click", ".MAINorder", function () {
   var productid = $(this).data('id');
   // alert(p_id);
    // $(".modal-body #tabledata").val( p_id );
 
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "addtocart.php",             
        dataType: "text",   //expect html to be returned  
        data:{product_id:productid},               
        success: function(data){                    
            $("#CART").html(data); 
            // alert(data);
            
        }

    });
 
   
});

 $(document).on("click", ".delete", function () {
   var productid = $(this).data('id');
   // alert(p_id);
    // $(".modal-body #tabledata").val( p_id );
 
      $.ajax({    //create an ajax request to load_page.php
        type:"GET",
        url: "add.php",             
        dataType: "text",   //expect html to be returned  
        data:{id:productid},               
        success: function(data){                    
            $("#CART").html(data); 
           // alert(data);
            
        }

    });
 
   
});



  
 // for the table
 $(document).ready(function() {
    var t = $('#example').DataTable( {
    
        "columnDefs": [ {   
            "searchable": false,
            "orderable": false,
            "targets": 0

        } ], 
          "sort": false,
          "bLengthChange": false,
          
         //ordering start at column 1
         "order": [[ 4, 'desc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
 
// end table



 // for the table
 $(document).ready(function() {
    var t = $('#home').DataTable( { 
     
    "sFirst": "First",
    "sLast": "Last",
    "bInfo": null,
    "bLengthChange": false ,
    "searching": false
          // "responsive": true
    } );


} );
 
// end table


   $(document).ready(function ($) {
                // delegate calls to data-toggle="lightbox"
                $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
                    event.preventDefault();
                    return $(this).ekkoLightbox({
                        onShown: function() {
                            if (window.console) {
                                return console.log('Checking our the events huh?');
                            }
                        },
            onNavigate: function(direction, itemIndex) {
                            if (window.console) {
                                return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                            }
            }
                    });
                });

                //Programatically call
                $('#open-image').click(function (e) {
                    e.preventDefault();
                    $(this).ekkoLightbox();
                });
                $('#open-youtube').click(function (e) {
                    e.preventDefault();
                    $(this).ekkoLightbox();
                });

        // navigateTo
                $(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {
                    event.preventDefault();

                    var lb;
                    return $(this).ekkoLightbox({
                        onShown: function() {

                            lb = this;

              $(lb.modal_content).on('click', '.modal-footer a', function(e) {

                e.preventDefault();
                lb.navigateTo(2);

              });

                        }
                    });
                });


            });