<?php 
// if ($_GET['q']=='cart'){
//    require_once("../include/initialize.php"); 
// }else{
//     require_once("include/initialize.php");
// }
 require_once("../include/initialize.php");
 $PROID =   $_GET['id']; 
$query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND  p.`PROID`=" . $PROID;
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();


  foreach ($cur as $result) { 
   
 ?>


        <!-- Portfolio Item Row -->
   <form   method="POST" action="cart/controller.php?action=add">
        
        <div class="row">

            <div class="col-md-6">
            <div class="row">
                <div class="col-m-12">
                    <div class="col-md-6 responsive">
                          <img width="250" class="img-portfolio " height="200"  src="<?php echo web_root . 'admin/products/'.  $result->IMAGES;?>" alt="">
               
                    </div>
                    </div>
                
            </div>
            
    
            </div>

     
            <div class="col-md-6">
              <input type="hidden" name="PROPRICE" value="<?php  echo $result->PRODISPRICE; ?>">
              <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

              <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                <h3><?php echo $result->PRONAME ; ?></h3>
                <p><?php echo   $result->CATEGORIES;?></p>
                <!-- <h3>Project Details</h3> -->
                <ul>
                    <li>Model - <?php echo $result->PROMODEL; ?></li>
                    <li>Type - <?php echo $result->PRODESC; ?></li>
                    <li>Price - &#8369 <?php echo $result->PROPRICE; ?></li> 
                    <li>Discount - <?php echo $result->PRODISCOUNT; ?> % </li> 
                    <li>Discounted Price - &#8369 <?php echo $result->PRODISPRICE; ?> </li> 
                    <li>Available Quantity - <?php echo $result->PROQTY; ?></li>
                </ul>

                 <button  type="submit"  class="btn btn-primary btn-sm"  name="btnorder">Order Now!</button>
            </div>
    
        </div>
        <!-- /.row -->
</form>

<?php } 
 
 ?>    

 