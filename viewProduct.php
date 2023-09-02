<?php
require_once("include/initialize.php");

    if(isset($_POST['close'])=='close'){
            unset($_SESSION['PROID']);
          // echo "<script> alert('get');</script>";
          redirect(web_root.'index.php'); 
          }

          if (isset($_POST['PROID'])){
          $_SESSION['PROID'] = $_POST['PROID'];
        }

   

       // $PROID =   $_POST['id']; 
       $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND p.`PROID`=" . $_SESSION['PROID'] ;
        $mydb->setQuery($query);
        $cur = $mydb->loadSingleResult();

             
      ?> 

 <div class="modal-dialog"  style="width:50%">
  <div class="modal-content">   
    <button class="close" data-dismiss="modal" type="button">×</button> 
       <form  method="POST" action="cart/controller.php?action=add">
     <div class="modal-body">  
              <div class="row">  
                <div class="col-md-6">
                  <img width="230" class="" height="220"  src="<?php echo web_root . 'admin/products/'.  $cur->IMAGES;?>" alt="">
                </div>

     
                <div class="col-md-6">
                    <input type="hidden" name="PROPRICE" value="<?php  echo $cur->PROPRICE; ?>">
                    <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $cur->PROQTY; ?>">

                    <input type="hidden" name="PROID" value="<?php  echo $cur->PROID; ?>">
                    <!-- <h3><?php echo $cur->PRONAME ; ?></h3> -->
                    <p><?php echo   $cur->CATEGORIES;?></p>
                    <!-- <h3>Project Details</h3> -->
                    <ul>
                      <!-- <li>Model - <?php echo $cur->PROMODEL; ?></li> -->
                      <li>Type - <?php echo $cur->PRODESC; ?></li>
                      <li>Price - &#8369 <?php echo $cur->PROPRICE; ?></li>
                       <?php if($cur->PRODISCOUNT>0){ ?>
                        <li>Discount - <?php echo $cur->PRODISCOUNT; ?> % </li> 

                        <li>Discounted Price - &#8369 <?php echo $cur->PRODISPRICE; ?> </li> 
                        <?php } ?>
                      <li>Available Quantity - <?php echo $cur->PROQTY; ?></li>
                    </ul> 
                    <button class="btn btn-pup"  name="btnorder" type="Submit">Order Now!</button> 
                    <button class="btn btn-default" id="btn_close" data-dismiss="modal" type="button">Close</button> 

                </div>
              
            
            </div> 
         </div> 
        </form> 
       </div> 
  </div> 