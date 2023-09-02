<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Liste de Produits   </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr>  
				  		<!-- <th>Model</th>  -->
				  		<!-- <th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> Product</th>  -->
				  		<th>Produit</th> 
				  		<!-- <th>Description</th> -->
				  		<th>Categorie</th>
				  		<th>Prix</th>
				  		<!-- <th>Quantity</th>   -->
				  		<th width="130">Action</th> 
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
				  		$query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
           					 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>'; 
				    		
				  		echo '<td>'.$result->PRODESC.'</td>';
				  		// echo '<td>'.$result->PRONAME.'</a></td>';
				  		
				  		echo '<td>'. $result->CATEGORIES.'</td>'; 
				  		// echo '<td>'. $result->CATEGORIES.'</td>'; 
				  		echo '<td> $ '.  number_format($result->PRODISPRICE,2).'</td>';
				  		// echo '<td width="4%">'. $result->PROQTY.'</td>'; .
				  		
				  		if ($result->PROSTATS=='Available'){
				  			$stats = 'Dispo';
				  		}else{
				  			$stats = 'Non dispo';
				  		}
				  		echo
				  		 '<td align="left">
							<a href="'.web_root.'admin/settings/controller.php?action=editStatus&id='.$result->PROID.'&stats='.$stats.'" class="btn btn-primary btn-xs">'.$stats.'</a>
							<a href="setDiscount.php?id='.$result->PROID.'" data-toggle="lightbox"  class="btn btn-primary btn-xs">Set la remise</a>
				  		 </td>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>

				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
				</div> -->
				</div>
				</form>
 
 