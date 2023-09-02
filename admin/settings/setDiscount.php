<?php  
require_once("../../include/initialize.php");
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

 
 $PROID =   $_GET['id']; 
$query = "SELECT * FROM `tblproduct` p  ,`tblcategory` c ,`tblpromopro` pr
            WHERE   p.`CATEGID`=c.`CATEGID` AND p.`PROID`=pr.`PROID` AND p.`PROID`=" . $PROID;
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();


  foreach ($cur as $result) { 
   
?>
     
   <form   method="POST" action="controller.php?action=discount">
        
        <div class="row">

            <div class="col-md-6">
            <div class="row">
                <div class="col-m-12">
                    <div class="col-md-8 responsive">
                          <img width="250" class="img-portfolio " height="200"  src="<?php echo web_root . 'admin/products/'.  $result->IMAGES;?>" alt="">
               
                    </div>
                    </div>
                
            </div>
            
      
            </div>

     
            <div class="col-md-6">
              <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
              <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

              <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                <!-- <h3><?php echo $result->PRONAME ; ?></h3> -->
                <p><?php echo   $result->CATEGORIES;?></p>
                <!-- <h3>Project Details</h3> -->
                <ul>
                    <!-- <li>Model - <?php echo $result->PROMODEL; ?></li> -->
                    <li>Type - <?php echo $result->PRODESC; ?></li>
                    <li>Prix - $ <?php echo $result->PROPRICE; ?></li>
                    <li>Remise(Rabais) - <?php echo $result->PRODISCOUNT; ?> % </li> 
                    <li>Prix reduit - $ <?php echo $result->PRODISPRICE; ?> </li> 
                </ul>

                

                 <!-- <button  type="submit"  class="btn btn-primary btn-sm"  name="btnorder">Order Now!</button> -->
            </div>
</div>
<div class="row">
        <div class="col-md-12">
        <h3 class="page-header">Definir la remise</h3>
        <div class="col-md-6">
 
             <div class="form-group">
                <label>Remise:</label>

                
                <div class="input-group">

                <input type="hidden" class="form-control " name="PROPRICE" id="PROPRICE" value=" <?php echo $result->PROPRICE; ?>">
                <input type="hidden" class="form-control " name="PROID" id="PROID" value=" <?php echo $result->PROID; ?>">

              
                  <input type="input" class="form-control disper" name="PRODISCOUNT" id="PRODISCOUNT" placeHolder="0">

                  <div class="input-group-addon">
                    <i>%</i>
                  </div>
                </div>
                <!-- /.input group -->
              </div>

             
        </div>
          <div class="col-md-6">
             <div class="form-group">
                <label>Prix reduit:</label>

               
                <div class="input-group">
                  <div class="input-group-addon">
                    <i> $ </i>
                  </div>
                  <input type="text"  class="form-control" name="PRODISPRICE" id="PRODISPRICE" placeHolder="0.0" readonly="true">
                </div>
                <!-- /.input group -->
              </div>
               
          </div>
         <div class="col-md-10">
             <div class="form-group">  
                  <input type="submit"  class="btn btn-sm btn-primary " name="submit"  value="Submit" > 
              </div>
               
          </div>
              
        </div>
         </div>
<?php } ?>       
       
        <!-- /.row -->
</form>

 