 
<?php require_once ("../../include/initialize.php"); 
   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }


?>


    <?php  
    if (isset($_POST['product_id'])){//add to cart

    $query = "SELECT * FROM `tblproducts` p  ,`tblcategory` c 
          WHERE   p.`CATEGORYID`=c.`CATEGORYID` and PRODUCTID='".$_POST['product_id']."'";
      $mydb->setQuery($query);
       $cur = $mydb->loadSingleResult();

       addtocart($cur->PRODUCTID,1,$cur->PRICE);

    }

                       
                  
 

    ?>
           


<?php
if(isset($_GET['updateid'])){//update cart
    $max=count($_SESSION['fixnmix_cart']);
    for($i=0;$i<$max;$i++){

      $pid=$_SESSION['fixnmix_cart'][$i]['productid'];

      $qty=intval(isset($_GET['QTY'.$pid]) ? $_GET['QTY'.$pid] : "");
       $price=(double)(isset($_GET['subTOT'.$pid]) ? $_GET['subTOT'.$pid] : "");
    // echo '<script> alert('.$price.')  </script>';
     
      if($qty>0 && $qty<=9999){ 

        $_SESSION['fixnmix_cart'][$i]['qty']=$qty;
       $_SESSION['fixnmix_cart'][$i]['price']=$price;
      }
    
    }
}
 ?>
<?php 

if(isset($_GET['id'])) { //remove to cart
  removetocart($_GET['id']); 
  } 
?>


 
<div class="container"> 
      <div class="">
        <div class="panel panel-default">
          <div class="panel-body">  
            <fieldset>  
              <legend><h2 class="text-left">Liste pagnet</h2></legend>
            <form action="index.php?view=orderdetails" method="post">
              <div class="table-responsive">
               <div  class="fixnmix_scroll_carttwo" >
                  <table  class="table fixnmix-table" id="table" >
                     <thead>
                       <tr>
                          <th width="5px">#</th>
                          <th>Produit</th>
                          <th>Description</th>
                          <th>Prix</th>
                          <th>Quantite</th>
                          <th>Total</th>
                          <th>Action</th>
                       </tr>
                     </thead>  
                     
                                     
                   <tbody > 
        

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
                                      <td><img src="<?php echo web_root.'admin/modules/product/'.$result->IMAGES; ?>" onload="totalprice()" width="50px" height="50px"></td>
                                      <td><?php echo $result->PRODUCTNAME ?></td>
                                      <td>$ <?php echo  $result->PRICE ?></td>
                                      <td>
                                      <input type="NUMBER" data-id="<?php echo $result->PRODUCTID;  ?>" class="qty" name="QTY<?php echo $result->PRODUCTID;  ?>" id="QTY<?php echo $result->PRODUCTID; ?>"  value="<?php echo $_SESSION['fixnmix_cart'][$i]['qty'] ?>"/>
                                      </td>
                                        <td>
                                        $ <output id="Osubtot<?php echo $result->PRODUCTID ?>"><?php echo   $_SESSION['fixnmix_cart'][$i]['price']; ?></output>
                                        </td>
                                      <!-- hidden textbox -->
                                      <input type="hidden" name="TOT<?php echo $result->PRODUCTID;  ?>" id="TOT<?php echo $result->PRODUCTID; ?>"  value="<?php echo $_SESSION['fixnmix_cart'][$i]['price'] ?>"/> 
                                      <input type="hidden" name="PRICE<?php echo $result->PRODUCTID;  ?>" id="PRICE<?php echo $result->PRODUCTID; ?>"  value="<?php echo $result->PRICE; ?>"/></td>
                                        <input type="hidden" name="originalqty<?php echo $result->PRODUCTID;  ?>" id="originalqty<?php echo $result->PRODUCTID; ?>"  value="<?php echo $result->QTY;   ?>"/> 
                                     <td>   <a href="controller.php?action=cartdelete&id=<?php echo $result->PRODUCTID; ?>"  data-id="<?php echo $result->PRODUCTID ?>"   class="delete btn btn-danger btn-xs">Remove</a></td> 
                                    </tr>
                          <?php
                            }

                          }
                        }
                      ?>
                                       
                            
                    </tbody>
                  </table>
                </div>
              <table>
           <tfoot  >
                    <div ><strong><h1 align="right" >Prix total : $ <span id="sum">0</span></h1></strong></td></div> 

                              
                  </tfoot>
        </table> 
       </div> 
      </form>   
   
                <a href="index.php?view=addorder" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Ajouter un autre produit</strong></a>
               <button type="submit" name="proceed" class="btn btn_fixnmix pull-right"   ><strong>Proceder au paiement (Validation)</strong> <span class="glyphicon glyphicon-chevron-right"></span></button> 
            </form>
       </fieldset>
          </div>    
        </div>
      </div>
   
 </div>