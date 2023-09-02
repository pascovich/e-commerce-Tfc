
<div class="container">
	<?php
		 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

		check_message();
			
		?>

 
 	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Liste des commandes</h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			 
			    <form action="controller.php?action=delete" Method="POST">  					
				 <div class="table-responsive">	
                  <table id="example" class="table  table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
			 		<thead>
			 		<tr >
				  		<th>#</th>
				  		<th>cmd#</th>
				  		<th>Client</th>
				  		<th>Date commande</th>	 
				  		<th >Prix</th>
				  		<th >Method de paiement</th>	
				  		<th>Status</th>
				  		<th width="100px">Action</th>
				 
				  	</tr>	
			   		</thead>
			   		<tbody>
					<?php 
				  		$query = "SELECT * FROM `tblsummary` s ,`tblcustomer` c 
				  				WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` ORDER BY   `ORDEREDNUM` desc ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
						?>

					<?php
						echo '<tr>';
				  		echo '<td width="3%" align="center"></td>';
				  		echo '<td><a href="#" title="View list Of ordered" data-target="#myModal" data-toggle="modal" class="orders" data-id="'.$result->ORDEREDNUM.'">'.$result->ORDEREDNUM .'</a> </td>';  
				  		echo '<td><a href="index.php?view=customerdetails&customerid='.$result->CUSTOMERID.'" title="View customer information">'. $result->FNAME.' '. $result->LNAME.'</a></td>';
				  		echo '<td>'. date_format(date_create($result->ORDEREDDATE),"M/d/Y h:i:s").'</td>';
				  		echo '<td> ($) '.number_format($result->PAYMENT ,2).'</td>';
				  		echo '<td >'.$result->PAYMENTMETHOD .'</td>';
				  		// echo '<td></td>';
				  		echo '<td >'. $result->ORDEREDSTATS.'</td>';
				  		if($result->ORDEREDSTATS=='Pending'){
				  				echo '<td><a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=cancel" class="btn btn-danger btn-xs">Cancel</a>
				  				<a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=confirm"  class="btn btn-primary btn-xs">Confirm</a></td>';
			  	 		}elseif($result->ORDEREDSTATS=='Confirmed'){
				  	 			echo '<td><a href="#"  class="btn btn-success btn-xs" disabled>Confirmed</a></td>';
				  	 		 
			  	 		}else{
			  	 			 echo '<td> <a  href="#"  class="btn btn-danger btn-xs" disabled>Cancelled</a></td>';
				
			
			  	 		} 
				  		// if($result->ORDEREDSTATS=='Pending'){
				  		// 		echo '<td><a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=cancel" class="btn btn-danger btn-xs">Cancel</a>
				  		// 		<a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=confirm"  class="btn btn-primary btn-xs">Confirm</a></td>';
			  	 	// 	}elseif($result->ORDEREDSTATS=='Confirmed'){
				  	 // 			echo '<td><a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=cancel" class="btn btn-danger btn-xs">Cancel</a>
				  		// 		<a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=deliver"  class="btn btn-success btn-xs">Deliver</a></td>';
				  	 		
			  	 	// 	}elseif($result->ORDEREDSTATS=='Delivered'){
			  	 	// 		  echo '<td> <a  href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=confirm"  class="btn btn-success btn-xs" disabled>Delivered</a></td>';
				
			  	 	// 	}else{
			  	 	// 		 echo '<td> <a  href="#"  class="btn btn-danger btn-xs" disabled>Cancelled</a></td>';
				
			
			  	 	// 	} 
				  		echo '</tr>';
 
				  	} 
				  	?> 
				 </tbody>
				 	
				</table>
				<div class="btn-group">
				</div>
				</div>
				</form> 

  <div class="modal fade" id="myModal" tabindex="-1">
						
	</div><!-- /.modal -->
