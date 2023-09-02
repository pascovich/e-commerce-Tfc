<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Liste de nos produits  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		<th width="1%">#</th>
				  		<th width="50">Image</th>
				  		<!-- <th>Model</th>  -->
				  		<!-- <th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> Product</th>  -->
				  		<th>Produit</th> 
				  		<th>Description</th>
				  		<!-- <th>Category</th> -->
				  		<th>Prix</th>
				  		<th>Remise%</th>  
				  		<th>Prix de remise </th>  

				  		<th>Quantite</th>  

				  		<!-- <th>Action</th>  -->
				  		 
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
				  		echo '<td width="1%" align="center"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->PROID. '"/></td>';
				    echo '<td style="padding:0px;">
							<a class="PROID" href="" data-target="#productmodal"  data-toggle="modal"  data-id="'.$result->PROID.'"> 
							<img  title="'.$result->CATEGORIES.'" style="width:100px;height:50px;padding:0;"  src="'. web_root.'admin/products/'.$result->IMAGES . '">
							</a></td>'; 	
				  		// echo '<td><a title="edit" href="'.web_root.'admin/products/index.php?view=edit&id='.$result->PROID.'"><i class="fa fa-pencil "></i> ' . $result->PROMODEL.'</a></td>';
				  		echo '<td><a title="edit" href="'.web_root.'admin/products/index.php?view=edit&id='.$result->PROID.'"><i class="fa fa-pencil "></i>'.$result->CATEGORIES.'</a></td>';
				  		
				  		echo '<td>'. $result->PRODESC.'</td>'; 
				  		echo '<td> ($)  '.  number_format($result->PROPRICE,2).'</td>';
				  		echo '<td> ($)  '.  number_format($result->PRODISCOUNT,0).'</td>';
				  		echo '<td> ($) '.  number_format($result->PRODISPRICE,2).'</td>';

				  		echo '<td width="4%">'. $result->PROQTY.'</td>';
				  		// echo '<td><a href="controller.php?action=delete&id='.$result->PROD.'" class="btn btn-danger">delete</a></td>';

				  		
				  		// if ($result->PROSTATS=='Available'){
				  		// 	$stats = 'Available';
				  		// }else{
				  		// 	$stats = 'NotAvailable';
				  		// }
				  	// 	echo
				  	// 	 '<td align="left">
							// <a href="'.web_root.'admin/products/controller.php?action=edit&id='.$result->PROID.'&stats='.$stats.'" class="btn btn-primary btn-xs">'.$stats.'</a>
							// <a href="settings.php?id='.$result->PROID.'" data-toggle="lightbox"  class="btn btn-primary btn-xs">Set Discount</a>
				  	// 	 </td>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>

				<div class="btn-group">
				  <!-- <a href="index.php?view=add" class="btn btn-default">New</a> -->
				  <button type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
				</div>
				</div>
				</form>
 
 <div class="modal fade" id="productmodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">ï¿½</button>

                                    <h4 class="modal-title" id="myModalLabel">Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>admin/products/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">

                                                            <input class="proid" type="hidden" name="proid" id="proid" value="">
                                                              <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                