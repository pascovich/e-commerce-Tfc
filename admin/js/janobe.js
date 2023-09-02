$(document).on("click", ".orders", function () {
   var ordernum = $(this).data('id');
   // alert(ordernum);
    // $(".modal-body #tabledata").val( p_id );

  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{ordernumber:ordernum},               
        success: function(data){                    
            $("#myModal").html(data); 
            // alert(data);

        }

    });
 
   
});


$(document).on("click", "#btnclose" , function () {
 
  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{close:"close"},               
        success: function(data){                    
            
            // alert("closing");
            
              
        }

    });
 
   
});

$(document).on("keyup", ".disper" , function () {
 



  var perDis = document.getElementById("PRODISCOUNT");
  var proPrice = document.getElementById("PROPRICE");
  var totprice  ;
  var dis;
  var subTot;

  if(perDis.value=='')
{
 document.getElementById("PRODISPRICE").value = 0.0;
}else{
    dis = perDis.value / 100 ;
  subTot = proPrice.value * dis;
  
 tot = proPrice.value - subTot;

 document.getElementById("PRODISPRICE").value = tot.toFixed(2);
}


 //  dis = perDis.value / 100 ;
 //  subTot = proPrice.value * dis;
  
 // tot = proPrice.value - subTot;

 // document.getElementById("PRODISPRICE").value = tot.toFixed(2);

});

// $(document).on("click", ".setBanner" , function () {
   
 
//       var chkelement=document.getElementsByName(selector);

//          alert(chkelement);

//       for(var i=0;i<chkelement.length;i++)
//       {
//         if (chkelement.item(i).checked==true){
//             alert('asas');

//         }
//       }
    
 
      // $.ajax({    //create an ajax request to load_page.php
      //   type:"POST",
      //   url: "orderedproduct.php",             
      //   dataType: "text",   //expect html to be returned  
      //   data:{close:"close"},               
      //   success: function(data){                    
            
      //       // alert("closing");
            
              
      //   }

    // });
 
   
// });

 function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }


