<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">
			<a href="<?php echo web_root; ?>admin/report/print/rpt_client2.php" target="_blank" rel="noopener noreferrer">Liste de nos clients  </a>
             </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		<th width="1%">#</th>
				  		<th >Date creation compte</th>
				  		<th width="30">Image</th>
				  		<!-- <th>Model</th>  -->
				  		<!-- <th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> Product</th>  -->
				  		<th>Nom</th> 
				  		<th>Postnom</th>
				  		<!-- <th>Category</th> -->
				  		<th>Adresse</th>
				  		<th>Sexe</th>  
				  		<th>N° Telephone </th>  

				  		<th>Username</th>  

				  		<!-- <th>Action</th>  -->
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
				  		$query = "SELECT * FROM `tblcustomer` order by CUSTOMERID Desc ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();
                            $idd=0;
						foreach ($cur as $result) { 
                            $idd++;
				  		echo '<tr>';
                        echo '<td width="1%" align="center">
                                '.$idd.'</td>';
                        echo '<td>'. $result->DATEJOIN.'</td>'; 
                        echo '<td style="padding:0px;">
							<img   style="width:100px;height:50px;padding:0;"  src="'. web_root.'customer/'.$result->CUSPHOTO . '">
							</td>'; 	
				  		// echo '<td><a title="edit" href="'.web_root.'admin/products/index.php?view=edit&id='.$result->PROID.'"><i class="fa fa-pencil "></i> ' . $result->PROMODEL.'</a></td>';
                        echo '<td>'. $result->FNAME.'</td>';   
                        echo '<td>'. $result->LNAME.'</td>';   
                        // echo '<td><a title="edit" href="'.web_root.'admin/products/index.php?view=edit&id='.$result->PROID.'"><i class="fa fa-pencil "></i>'.$result->CATEGORIES.'</a></td>';
				  		
				  		echo '<td>'. $result->CITYADD.'</td>'; 
				  		echo '<td>'. $result->GENDER.'</td>'; 
				  		echo '<td>'. $result->PHONE.'</td>'; 
				  		echo '<td>'. $result->CUSUNAME.'</td>'; 
				  		
		
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

                