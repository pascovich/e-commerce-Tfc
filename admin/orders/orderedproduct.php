
<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }


// if (isset($_POST['id'])){

// if ($_POST['actions']=='confirm') {
// 							# code...
// 	$status	= 'Confirmed';	
// 	// $remarks ='Your order has been confirmed. The ordered products will be yours in the exact date and time that you have set.';
	 
// }elseif ($_POST['actions']=='cancel'){
// 	// $order = New Order();
// 	$status	= 'Cancelled';
// 	// $remarks ='Your order has been cancelled due to lack of communication and incomplete information.';
// }

// $order = New Order();
// $order->STATS       = $status;
// $order->update($_POST['id']);


// }

if(isset($_POST['close'])){
	unset($_SESSION['ordernumber']);
}

if (isset($_POST['ordernumber'])){
	$_SESSION['ordernumber'] = $_POST['ordernumber'];
}


$query = "SELECT * FROM `tblsummary` s ,`tblcustomer` c 
				WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` an ORDEREDNUM=".$_SESSION['ordernumber'];
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();


?>

<div class="modal-dialog" style="width:70%">
<div class="modal-content">
	<div class="modal-header">
		<button class="close" id="btnclose" data-dismiss="modal" type=
		"button">×</button>
		<h2> Numero commande : <?php echo $_SESSION['ordernumber']; ?></h2>

		<!-- <h2 class="modal-title" id="myModalLabel"><strong>List of Ordered Products</strong></h2> -->
		
		
	</div>
	<div class="row" style="margin:2%">
		<div class="col-md-6">Nom client : <?php echo $cur->FNAME . ' '.  $cur->LNAME ;?></div>
		<div class="col-md-6">Addresse:  <?php echo $cur->CUSHOMENUM . ' ' . $cur->STREETADD . ' ' .$cur->BRGYADD . ' ' . $cur->CITYADD . ' ' .$cur->PROVINCE . ' ' .$cur->COUNTRY; ?>
     </div>
	</div>
		

		 
	<form action="controller.php?action=photos&id=<?php echo $customerid; ?>" enctype="multipart/form-data" method=
	"post">
		<div class="modal-body"> 
		<table id="table" class="table">
			<thead>
				<tr>
					<th>PRODUIT</th>
					<th>DESCRIPTION</th>
					<th>PRIX</th>
					<th>QUANTITE</th>
					<th>TOTAL PRIX</th> 
					<th>STATUS</th>
					<!-- <th></th>  -->
				</tr>
				</thead>
				<tbody>
 
				<?php
				  $subtot =0;
				  $query = "SELECT * 
							FROM  `tblproduct` p, tblcategory ct,  `tblcustomer` c,  `tblorder` o,  `tblsummary` s
							WHERE p.`CATEGID` = ct.`CATEGID` 
							AND p.`PROID` = o.`PROID` 
							AND o.`ORDEREDNUM` = s.`ORDEREDNUM` 
							AND s.`CUSTOMERID` = c.`CUSTOMERID` 
							AND o.`ORDEREDNUM`=".$_SESSION['ordernumber'];
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
						echo '<tr>';  
				  		echo '<td ><img src="'.web_root.'admin/products/'. $result->IMAGES.'" width="60px" height="60px" title="'.$result->PRODESC.'"/></td>';
				  	 	echo '<td>'. $result->PRODESC.'</td>';
				  		echo '<td> ($) '.number_format($result->PROPRICE,2).' </td>';
				  		echo '<td align="center" >'. $result->ORDEREDQTY.'</td>';
				  		?>
				  		 <td> ($) <output><?php echo number_format($result->ORDEREDPRICE,2); ?></output></td> 
				  		<?php
				  		echo '<td id="status" >'. $result->ORDEREDSTATS.'</td>';
				  	 	echo '</tr>';
				 $subtot +=$result->ORDEREDPRICE;
				}
				?> 
			</tbody> 
		<?php 
				 $query = "SELECT * FROM `tblsummary` s ,`tblcustomer` c 
				WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` and ORDEREDNUM=".$_SESSION['ordernumber'];
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();

		// if ($cur->PAYMENTMETHOD=="Cash on Delivery") {
		// 	# code...
		// 	$price = 10;
		// }else{
		// 	$price = 0;
		// }
		//   $tot =   $cur->DELFEE  - 25.00;
		?>
	 
       </table> 
       <hr/>
       <div class="row">
		  	<div class="col-md-6 pull-left">
		  	 <div>Date commande : <?php echo date_format(date_create($cur->ORDEREDDATE),"M/d/Y h:i:s"); ?></div> 
		  		<div> Methode De paiement : <?php echo $cur->PAYMENTMETHOD; ?></div>

		  	</div>
		  	<div class="col-md-6 pull-right">
		  		<p align="right">Total Prx total : ($) <?php echo number_format($subtot,2);?></p>
		  		<p align="right">Fais de livraison : ($) <?php echo number_format($cur->DELFEE,2); ?></p>
		  		<p align="right">Total : ($) <?php echo number_format($cur->PAYMENT,2); ?></p>
		  	</div>
		  </div> 
		</div>   
		<div class="modal-footer">
			<button class="btn btn_fixnmix" id="btnclose" data-dismiss="modal" type=
			"button">Close</button>  
		</div>

	</form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>


  var table = document.getElementById('table');
    var items = table.getElementsByTagName('output');
    var sum = 0;

    // total price
    for(var i=0; i<items.length; i++)
        sum +=  parseInt(items[i].value);        
// for cart
    var totprice = document.getElementById('sum');
    totprice.innerHTML =  sum.toFixed(2);
    </script>