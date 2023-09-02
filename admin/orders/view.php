<div class="container">
<div class="panel-body inf-content">
   
<?php  
     if (!isset($_SESSION['userid'])){
      redirect(web_root."index.php");
     }


	  @$customerid = $_GET['customerid'];	  
	  @$productid = $_GET['productid'];
	  if (isset($customerid)){

	  $customer = New Customer();
	  $singlecustomer = $customer->single_customer($customerid);
	?>
<?php  
      $user_id = $_GET['customerid'];
      $user = New User();
      $singleuser = $user->single_user($user_id);

    ?>

                  
	 <div class="row">
        <div class="col-md-4">
        <a data-target="#myModal" data-toggle="modal" href="" title=
						"Click here to Change Image.">
            <img alt="" style="width:600px; height:400px;>" title="" class="img-square img-thumbnail isTooltip" src="<?php echo web_root.'customer/'. $singlecustomer->IMAGE; ?>" data-original-title="Usuario">          
          </a>  
        </div>
        <div class="col-md-6">
            <h1><strong>Details du client</strong></h1><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
               
                    <tr>    
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-user  text-primary"></span>     -->
                                Id Number                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->CUSTOMERID; ?>     
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-cloud text-primary"></span>   -->
                                Nom complet                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->FIRSTNAME . ' ' .$singlecustomer->LASTNAME; ?>  
                        </td>
                    </tr>

                  <!--   <tr>        
                        <td>
                            <strong> -->
                                <!-- <span class="glyphicon glyphicon-bookmark text-primary"></span>  -->
                            <!--     City Address                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->CITYADDRESS; ?>
                        </td>
                    </tr>
 -->

                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                                Addresse                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->ADDRESS; ?>
                        </td>
                    </tr>

              <!--         <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                       <!--          Email Address                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singleuser->UEMAIL; ?>
                        </td>
                    </tr> -->  
                     <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                                Numero de telephone                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->CONTACTNUMBER; ?>
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                                Zipcode                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->ZIPCODE; ?>
                        </td>
                    </tr>
                    
 
				
 
<?php  
}elseif(isset($productid)){

	  $product = New Product();
	  $singleproduct = $product->single_product($productid);

	  // $origin = New Origin();
	  // $singleorigin = $origin->single_origin($singleproduct->ORIGINID);

	   $category = New Category();
	  $singlecategory = $category->single_category($singleproduct->CATEGORYID);
	?>
	     <div class="row">
        <div class="col-md-4">
        <a data-target="#myModal" data-toggle="modal" href="" title=
						"Click here to Change Image.">
            <img alt="" style="width:600px; height:400px;>" title="" class="img-circle img-thumbnail isTooltip" src="../product/<?php echo $singleproduct->IMAGE; ?>" data-original-title="Usuario"> 
          
          </a> <!--  <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul> -->
        </div>
        <div class="col-md-6">
            <h1><strong>Details produit</strong></h1><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
               
                    <tr>    
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-user  text-primary"></span>     -->
                                Nom                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singleproduct->PRODUCTNAME; ?>     
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-cloud text-primary"></span>   -->
                                Categorie                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecategory->CATEGORY; ?>  
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-bookmark text-primary"></span>  -->
                                Prix                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singleproduct->PRICE; ?> &#8369 
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                                 Quantite disponible                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singleproduct->QTY; ?>
                        </td>
                    </tr>
 
<?php } ?>
						<tr>        
                        <td>
                            
							<a href="index.php" class="btn btn_fixnmix" name="back" type="submit">Back</a>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                                 
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>			