<?php 
	 if (!isset($_SESSION['U_ROLE'])=='Administrator'){
      redirect(web_root."admin/index.php");
     } 
?>

<!-- <div class="row">
<form  action="index.php" method="post">  
	<div class="col-lg-3 col-lg-offset-3">
	 <div class="panel panel-default">
	 <div class="panel-heading" >Search</div>
	 <div class="col-md-12"  ><br/>
 		<div class="row" style="line-height:4px;">
			<div class="col-md-12">
		          <label>Product::</label>
			      <div class="form-group">
		                <input type="text" class="form-control input-sm" placeholder="Search for...."> 
		            </div>
				</div>
				<div class="col-md-12">
		          <label>Payment Method::</label>
			      <div class="form-group">  
		                <select class="form-control  input-sm">
		                    <option>Cash on Pick Up</option>
		                    <option>Cash on Delivery</option>
		                    <option>All</option> 
		                </select>
		            </div> 
				</div>
				<div class="col-md-6">
					<div class="form-group input-group"> 
		                <label>From::</label> 
		                <input type="text"  name="date_pickerfrom" id="date_pickerfrom"  value="<?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] :date_create('m/d/Y');?>" readonly="true" class=" input-sm datetimepicker  form-control">
		                <span class="input-group-btn">
		                    <i class="fa  fa-calendar" ></i> 
		                </span>
		            </div>
				</div>
					<div class="col-md-6">
					<div class="form-group input-group"> 
		                <label>To::</label> 
		                <input type="text"  name="date_pickerto" id="date_pickerto" value="<?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : date_create('m/d/Y');?>"  readonly="true" class="datetimepicker   form-control  input-sm">
		                <span class="input-group-btn">
		                    <i class="fa  fa-calendar" ></i> 
		                </span>
		            </div>
				</div>
				<div class="col-md-12 pull-right">
			      <div class="form-group input-group"> 
		                <span class="input-group-btn">
		                    <button class="btn btn-primary" name="submit" type="submit" >Search <i class="fa fa-search"></i>
		                    </button>
		                </span>
		            </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
   
	</form>
</div>  -->

<div class="row" style="margin:0;text-align:center;">
<form  action="index.php" method="post">  
	 <div class="col-lg-6"></div>
   <div class="col-lg-4"> 
	 <div class="col-md-12"  > 
 	    <div class="row">
		  <div class="col-md-6">
				<div class="form-group input-group"> 
	                <label>From::</label> 
	                <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                           data-link-format="yyyy-mm-dd"
                           name="date_pickerfrom" id="date_pickerfrom"  
                           value="<?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] :'';?>"
                            readonly="true" class="date_pickerfrom input-sm form-control">
	                <span class="input-group-btn">
	                    <i class="fa  fa-calendar" ></i> 
	                </span>
	            </div>
				</div>
					<div class="col-md-6">
					<div class="form-group input-group"> 
		                <label>To::</label> 
		                <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                           data-link-format="yyyy-mm-dd"
                           name="date_pickerto" id="date_pickerto" 
                           value="<?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : '';?>" 
                            readonly="true" class="date_pickerto form-control  input-sm">
		                <span class="input-group-btn">
		                    <i class="fa  fa-calendar" ></i> 
		                </span>

		            </div>
				</div>
	    </div> 
	 </div>
   </div>
   <div class="col-lg-2">  
 	    <div class="row">
		  <div class="col-md-12">
			 <div class="form-group input-group" style="margin-top:25px;">  
                <button class="btn btn-primary btn-sm" name="submit" type="submit" >Search <i class="fa fa-search"></i>
                </button> 
            </div>
		   </div>  
	    </div> 
	 </div>
   </div>
</form>
</div>




<div class="row">
<span id="printout">
	<div class="col-md-12" >
	<div class="page-header" style="text-align:center;" ><h1>List of Ordered Products</h1>
		<div>Inclusive Dates: From : <?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] :'';?> - To : <?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : '';?> </div>
	</div>
		 
<form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<table class="table table-bordered table-hover" align="center" cellspacing="10px">
		<thead>
			<tr bgcolor="skyblue" style="font-weight: bold;"> 
				<td >Date Ordered</td>  
				<!-- <td >Customer</td> -->
				<td >Product</td>
				<td >Original Price</td>
				<td >Price</td>
				<td >Quantity</td> 
				<td >Sub-total</td>
			</tr>

		</thead>
		<tbody>		
<?php
	$totAmount = 0;
	$Capital = 0;
	$totQty =0;
	$markupPrice = 0;
if(isset($_POST['submit'])){
 // 	$_SESSION['date_pickerfrom']=$_POST['date_pickerfrom'];
	// $_SESSION['date_pickerto']=$_POST['date_pickerto'];	

 // echo date_format(date_create($_POST['date_pickerfrom']),'Y-m-d');
// echo $_POST['txtSearch'];
// $query = "SELECT  *  FROM  `tblcustomer` c,  `tblsummary` s WHERE  c.`CUSTOMERID` = s.`CUSTOMERID` AND  ORDEREDSTATS='Confirmed' AND date(ORDEREDDATE)>='". date_format(date_create($_POST['date_pickerfrom']), "Y-m-d")."' AND date(ORDEREDDATE) <='". date_format(date_create($_POST['date_pickerto']), "Y-m-d")."'";
// $query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C 
// WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  
// AND CONCAT(`PRODESC`, ' ' ,O.`ORDEREDNUM`, ' ' ,`FNAME`,' ', `LNAME`, ' ',`MNAME`) LIKE '%{$_POST['txtSearch']}%' AND DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
// AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' GROUP BY `PRODESC`
// ";

$query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C 
WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  
AND  DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' GROUP BY `PRODESC`
";


// $query = "SELECT  *  FROM  `tblcustomer` c,  `tblsummary` s 
//            WHERE  c.`CUSTOMERID` = s.`CUSTOMERID` AND  ORDEREDSTATS='Confirmed' 
//            AND  date(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']), "Y-m-d")."' 
//            date(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']), "Y-m-d")."'";


			$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

				  		if(!isset($cus)){
				  			foreach ($cur as $result) {
			# code...		
				  				$AMOUNT = $result->PROPRICE * $result->QTY ;
							echo '<tr>
									<td>'.date_format(date_create($result->ORDEREDDATE),'M/d/Y h:i:s').'</td>   
									<td>'.$result->PRODESC.'</td>
									<td>'.$result->ORIGINALPRICE.'</td>
									<td>'.$result->PROPRICE.'</td>
									<td>'.$result->QTY .'</td>
									<td>'.$AMOUNT.'</td>  
								 </tr>';
			
			$Capital += $result->ORIGINALPRICE;	
			$markupPrice += $result->PROPRICE;
			$totQty +=$result->QTY;				 
 			$totAmount += $AMOUNT;
								} }else{
									echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';
								}
 
	}else{
			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

	}
		 
 
?>
</tbody>
<tfoot>
	<tr>
		<td colspan="2">Total</td>
		<td><?php echo $Capital; ?></td>
		<td><?php echo $markupPrice; ?></td>
		<td><?php echo $totQty; ?></td>
		<td><?php echo $totAmount; ?></td>
	</tr>
</tfoot>
</table>
 </form>
	</div>
	</span>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2"> 	
			<button onclick="tablePrint();" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
 		</div>
	  </div>
	</div>
</div>
   
<script>
function tablePrint(){  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:Calibri(body);  font-size:8px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close();  
    return false;  
    } 
	$(document).ready(function() {
		oTable = jQuery('#list').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});	

		
</script>