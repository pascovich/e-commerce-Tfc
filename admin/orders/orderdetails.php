 <?php

   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

               if(isset($_GET['fname'])){

                        // $claimdate = date_create($_GET['CLAIMEDDATE']); 
                        $_SESSION['FIRSTNAME'] = $_GET['fname'];
                        $_SESSION['LASTNAME'] = $_GET['lname'];
                        $_SESSION['ADDRESS'] = $_GET['address'];
                        $_SESSION['CONTACTNUMBER'] = $_GET['contact'];
                        // $_SESSION['CLAIMEDDATE'] = date("Y-m-d h:i:s");
                        $_SESSION['CUSTOMERID'] = $_GET['CUSTOMERID']; 
                        $_SESSION['paymethod'] = 'Cash on Pickup'; 
                        $_SESSION['ORDERNUMBER'] = $_GET['ORDERNUMBER'];
                        $_SESSION['alltot'] = $_GET['alltot'];
                        redirect('controller.php?action=processorder');
                      }

                 ?>
<!-- 
<form action="" method="post"> -->
<div class="container">
  <!-- <div class="col-xs-10 col-sm-9">  -->
      <div class="">
        <div class="panel panel-default">
          <div class="panel-body">  
            <fieldset>  
              <legend><h2 class="text-left"> Details commande</h2></legend>

            <table class="fixnmix-table">
          
              <tbody>
                <tr>
                <td width="100px"> Nom </td><td  width="350px"> 
                         <input  id="FIRSTNAME" name="FIRSTNAME"  class="form-control input-sm"  type="text" value="<?php echo isset($_SESSION['FIRSTNAME'])? $_SESSION['FIRSTNAME'] : ""; ?>"></td>
                <td width="100px"> Postnom</td><td> <input  id="LASTNAME" name="LASTNAME"  class="form-control input-sm"  type="text" value="<?php echo isset($_SESSION['LASTNAME'])? $_SESSION['LASTNAME'] : ""; ?>"></td>
                </tr>
                <tr>
                <td>Addresse </td><td> <input  id="ADDRESS" name="ADDRESS"  class="form-control input-sm"  type="text" value="<?php echo isset($_SESSION['ADDRESS'])? $_SESSION['ADDRESS'] : ""; ?>"></td>
                 <td  width="100px">N° Telephone  </td><td  width="350px"> <input  id="CONTACTNUMBER" name="CONTACTNUMBER"  class="form-control input-sm"  type="number" value="<?php  echo isset($_SESSION['CONTACTNUMBER'])? $_SESSION['CONTACTNUMBER'] : "";?>"></td>
              </tr>        
              </tbody> 
             <tfoot><tr><td></td></tr></tfoot>
            </table>
   
              <table class="fixnmix-table" id="table">
                <thead >
                <tr>
                  <th width="10">#</th>
                  <th>Produit</th>
                  <th>Description</th>
                  <th>Quantite</th>
                  <th style="width:100px">Prix</th>
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
                          <td><img src="<?php echo web_root.'admin/modules/product/'.$result->IMAGES; ?>" onload="totalprice()" width="50px" height="50px"></td>
                          <td><?php echo $result->PRODUCTNAME ?></td>
                          <td><?php echo $_SESSION['fixnmix_cart'][$i]['qty'] ?></td>
                          <td>($) <?php echo  $result->PRICE ?></td>
                          <td>($) <output><?php echo $_SESSION['fixnmix_cart'][$i]['price']?></output></td>
                        </tr>
              <?php
                        }

                      }
                }
              ?>
              </div>
                </tbody>
              
              </table>

            <div class="container"> 
              <div class="row"> <h3  align="right" margin-right="20%">Total Prix : ($) <span  id="sum">0.00</span></h3></div>  
                </div>
           
                <?php 
                $autonum = New Autonumber();
                $res = $autonum->single_autonumber(1); 
                ?>
                <input  id="CUSTOMERID" name="CUSTOMERID"   type="hidden" value="<?php echo $res->AUTO; ?>"> 
                <?php 
                $autonum = New Autonumber();
                $res = $autonum->single_autonumber(3);
                ?>
                 <input  id="ORDERNUMBER" name="ORDERNUMBER"   type="hidden" value="<?php echo $res->AUTO; ?>"> 
                  <a href="index.php?view=addtocart" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>View Cart</strong></a>
                <button   name="submitorder"  id ="submitorder" class="btn btn_fixnmix pull-right"  onclick="validatedate()" ><strong>Save Order</strong> <span class="glyphicon glyphicon-chevron-right"></span></button> 
           
            </fieldset>
          </div>    
        </div>
      </div>
   
 </div>
<!-- </form> -->