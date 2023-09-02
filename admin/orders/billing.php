<?php
   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

?>
  <form action="" method="post">
<div class="container"> 
      <div class="">
        <div class="panel panel-default">
          <div class="panel-body">  
            <fieldset>  
           
  <span id="printout">
  <h3 align="center">Fix and Mix Bakeshop</h3>
      <h4 align="center">Block 5 AR Zayco Subdivision<br/>
      Kabankalan City<br/>
      </h4>

              <legend><h2 class="text-left">Billing Details</h2></legend>

   <table>
          <thead>
            <tr>
              <th width="200px"></th>
              <th width="300px"></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Name</td>
              <td>:<?php echo  $_SESSION['FIRSTNAME'].' '.$_SESSION['LASTNAME'] ; ?></td>
              <td></td>
              <!-- <td>Date: <?php echo $_POST['form_datetime'];?> </td> -->
            </tr>
            <tr>
              <td>Address</td>
              <td>: <?php echo $_SESSION['ADDRESS']; ?></td>
              <td> </td>
              <td>Order Number :<?php echo $_SESSION['ORDERNUMBER']; ?></td>
              
            </tr>
         
            <tr>
              <td>Contact Number</td>
              <td>:<?php echo $_SESSION['CONTACTNUMBER'] ; ?></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
          </table>
            
              <table class="fixnmix-table" id="list">
                <thead >
                <tr>
                  <th width="10">#</th>
                  <!-- <th>Product</th> -->
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th style="width:100px">Price</th>
                  <th style="width:120px">Total</th>
                  </tr>
                </thead>
                <tbody>    
                       
              <?php
                if (!empty($_SESSION['fixnmix_cart'])){ 
                      $count_cart = count($_SESSION['fixnmix_cart']);
                      for ($i=0; $i < $count_cart  ; $i++) { 
                      $query = "SELECT * FROM `tblproducts` p , `tblcategory` c 
                        WHERE  p.`CATEGORYID`=c.`CATEGORYID` and PRODUCTID='".$_SESSION['fixnmix_cart'][$i]['productid']."'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result){ 
              ?>

                         <tr>
                         <td></td>
                          <!-- <td><img src="<?php echo web_root.'admin/modules/product/'.$result->IMAGES; ?>" onload="totalprice()" width="50px" height="50px"></td> -->
                          <td><?php echo $result->PRODUCTNAME ?></td>
                          <td><?php echo $_SESSION['fixnmix_cart'][$i]['qty'] ?></td>
                          <td>&#8369 <?php echo  $result->PRICE ?></td>
                          <td>&#8369 <output><?php echo $_SESSION['fixnmix_cart'][$i]['price']?></output></td>
                        </tr>
              <?php
                        }

                      }
                }
              ?>
              </div>
                </tbody>
              <?php 
                  $query = "SELECT * FROM `tblpayment` p ,`tblcustomer` c 
                  WHERE   p.`CUSTOMERID`=c.`CUSTOMERID` and ORDERNUMBER='".$_SESSION['ORDERNUMBER']."'";
                  $mydb->setQuery($query);
                  $cur = $mydb->loadSingleResult();

                  // if ($cur->PAYMENTMETHOD=="Cash on Delivery") {
                  // # code...
                  // $price = 25.00;
                  // }else{
                  // $price = 0.00;
                  // }


                  // $tot =   $cur->TOTALPRICE  - 25.00;
                  ?>
              </table> 
              <p> <hr/> </p> 
              <div class="row">
              <!--   <div class="col-md-6 pull-left">
                  <div>Claimed Date : <?php echo date_format(date_create($cur->CLAIMDATE),"M/d/Y h:i:s"); ?></div>
                  <div>Payment Method : <?php echo $cur->PAYMENTMETHOD; ?></div>

                </div> -->
                <div class="col-md-4 pull-right">
                  <!-- <div>Total Price : &#8369 <?php echo number_format($tot,2);?></div> -->
                  <!-- <div>Delivery Fee : &#8369 <?php echo number_format($price,2); ?></div> -->
                  <div>Overall Price : &#8369 <?php echo number_format($cur->TOTALPRICE,2); ?></div>
                </div>
              </div>
              <div class="row" style="margin-left:2%"> 
                <p>We hope you enjoy your purchased products. Have a nice day!</p>
                <p>Sincerely.</p>
                <h4>Fix N' Mix BakeShop</h4>
            </div>


            <div id="divButtons" name="divButtons">
            <button  onclick="tablePrint();" class="btn btn_fixnmix pull-right "><span class="glyphicon glyphicon-print" ></span> Print</button>     
            </div>
</span>
            </fieldset>
            

          </div>    
        </div>
      </div>
   </div>  
</form>
<?php 

      // unset($_SESSION['fixnmix_cart']);
      // unset($_SESSION['FIRSTNAME']);
      // unset($_SESSION['LASTNAME']);
      // unset($_SESSION['ADDRESS']);
      // unset($_SESSION['CONTACTNUMBER']);
      // unset($_SESSION['CLAIMEDDATE']);
      // unset($_SESSION['CUSTOMERID']); 
      // unset($_SESSION['paymethod']) ;
      // unset($_SESSION['ORDERNUMBER']);
      // unset($_SESSION['alltot']);


?>
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
     // document.all.divButtons.style.visibility = 'Show';  
   
    return false; 

    } 
  // $(document).ready(function() {
  //   oTable = jQuery('#list').dataTable({
  //   "bJQueryUI": true,
  //   "sPaginationType": "full_numbers"
  //   } );
  // });   
</script>