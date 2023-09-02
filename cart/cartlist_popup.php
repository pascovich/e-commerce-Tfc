
<?php
   if(isset($_POST['btnorder'])){
    $pid= $_POST['PROID'];
    $price= $_POST['PROPRICE'];


    $sql = "SELECT * FROM `tblproduct` WHERE `PROID` ='" . $pid. "'";
       $result = mysql_query($sql) or die(mysql_error());
       while ($row = mysql_fetch_array($result)) {
        
        $tot = floatval ($price) * 1;
        $qty = 1;
   

      
 
      addtocart($pid,$qty , $tot); 
      redirect(web_root."index.php?q=cart");
        
      }
}


?>



    <div class="col-md-12 col-sm-8 content">  
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-shadow">
                    <div class="panel-heading panel-fixnmix" > 
                        <h1> Cart List </h1>     
                    </div>
                    <div class="panel-body">                 
                    <div class="table-responsive">
                         <table  class="table table-default " id="table" >
                         <thead>
                           <tr>
                             <td>
                             <div class="culomn4"><div style="float: left; width:90px">Product</div></div>
                             <div class="culomn4"><div style="float: left; width:250px">Description</div></div>
                             <div class="culomn4"><div style="float: left; width:200px">Quantity</div></div>
                             <div class="culomn4"><div style="float: left; width:110px">Price</div></div>
                             <div class="culomn4"><div style="float: left; width:50px">Total</div></div>
                             </td>
                           </tr>
                         </thead>                     
                         
                         <body onload=" totalprice(); ">
                            <tr> 
                             <td>
                               <div  class="fixnmix_scroll_cart" >
                             <?php

                              if (!empty($_SESSION['fixnmix_cart'])){ 

                                echo '<script>totalprice()</script>';

                                  $count_cart = count($_SESSION['fixnmix_cart']);

                                for ($i=0; $i < $count_cart  ; $i++) { 

                                     //  # code...
                                     // echo 'for id :'. $_SESSION['cart'][$i]['productid'] ;
                                     //  echo 'for qty'.  $_SESSION['cart'][$i]['qty'].'<br/>';

                                       $query = "SELECT * FROM tblproducts p, tblcategory o 
                                      WHERE o.`CATEGORYID`=p.`CATEGORYID` and `PRODUCTID` = '".$_SESSION['fixnmix_cart'][$i]['productid']."'";
                                       $mydb->setQuery($query);
                                         $cur = $mydb->loadResultList();
                                
                                
                                 foreach ($cur as $result) {

                                ?>

                              <form id="form" action="cart/controller.php?action=edit" method="POST"  
                                        onmousemove=" if(QTY.value=='' || QTY.value<1){
                                          QTY.value =1;
                                          }else{
                                          if(parseInt(availqty.value)> QTY.value ){

                                          var price = '<?php echo $result->PRICE;  ?>';
                                          TOT.value=parseFloat(QTY.value)*parseFloat(PRICE.value); 
                                         
                                          var totalval =parseFloat(QTY.value) * parseFloat(price);
                                          TOTAL.value =  totalval.toFixed(2);

                                            totalprice(); 
                                            }else{ 
                                              QTY.value = parseInt(availqty.value);
                                            } }"
 
                                          oninput=" 
                                       
                                          if(parseInt(availqty.value)> QTY.value ){

                                          var price = '<?php echo $result->PRICE;  ?>';
                                          TOT.value=parseFloat(QTY.value)*parseFloat(PRICE.value); 
                                         
                                          var totalval =parseFloat(QTY.value) * parseFloat(price);
                                          TOTAL.value =  totalval.toFixed(2);

                                            totalprice(); 
                                            }else{
                                            alert('The quantity that you put is greater than the available quantity of the product.');
                                              QTY.value = parseInt(availqty.value);
                                            } " > 


                                  <div class="column4">                                  
                                    <div style="float: left; width:90px">
                                      <img src="admin/modules/product/<?php echo $result->IMAGES; ?>"  onload="  totalprice() " 
                                      width="50px" height="50px">
                                    </div>
                                     <input type="hidden" name="availqty" value="<?php echo $result->QTY; ?>">

                                    <div style="float: left; width:250px"><?php echo  $result->PRODUCTNAME ; ?></div>
 
                                    <div class="form-inline" style="float: left; width:190px">  
                                        <input class="form-control" autocomplete="off"  id ="QTY" name="QTY<?php echo $result->PRODUCTID ?>" type="number"  value="<?php echo $_SESSION['fixnmix_cart'][$i]['qty']; ?>"> 
                                        <!-- hidden -->
                                        <input type="hidden" id="PRICE" name="PRICE" value="<?php echo $result->PRICE; ?>" />
                                        <input type="hidden" id="TOT" name="TOT<?php echo $result->PRODUCTID ?>" value="<?php echo $_SESSION['fixnmix_cart'][$i]['price']; ?>" />

                                        <!-- END -->
                                        <a href="cart/controller.php?action=delete&id=<?php echo $result->PRODUCTID; ?>" class="btn btn-link"   >Remove</a> 
                                        <button type="submit" name="update" class="btn btn-link" >Update</button>                                     
                                     </div> 

                                    <!-- <div style="float: right; width:100px"></div> -->
                                     <div style="float: left; width:50px">&nbsp;&nbsp;&#8369<span id="price1"><?php echo $result->PRICE; ?></span></div>
                                     <div  id="test" style="float: right; width:50px">&#8369<output name="TOTAL" for="QTY price"></output></div>                                     
                                  </div>
                              </form> 

                            <?php  
                                 }
                               }
                               }else{ 
                                  echo "<h1>There is no item in the cart.</h1>";
                               } 
                            ?>
                              </div> <!--Scrollbar--> 
                          
                              </td>
                        
                            </tr>
                            <tr >  
                            <td>                               
                             <div class="culomn4"><div style="float: right;"><h1> Total Price : &#8369<span id="sum">0</span></h1></div></div>
                            </td>                        
                              
                            </tr>
 
                      </body>
                      </table>
                   </div> 
                  <!--reponsive -->
              
                </div>
                </div>               
                <a href="index.php?page=2" class="btn btn-default pull-left"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Add New Order</strong></a>
                <a href="index.php?page=7" name="proceed"  class="btn btn_fixnmix pull-right"   ><strong>Proceed And Checkout</strong> <span class="glyphicon glyphicon-chevron-right"></span></a> 
                
            </div>
        </div>
        </div>