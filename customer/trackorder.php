<?php  
 
     if (!isset($_SESSION['CUSID'])){
      redirect("index.php");
     }


     // if($_SESSION['fixnmixConfiremd']>0){
     //   $query = "update `tblpayment` SET `HVIEW` = true WHERE `CUSTOMERID`='".$_SESSION['CUSID']."' AND STATS in ('Confirmed','Cancelled')  AND HVIEW=0";
     //    mysql_query($query);
     // }
    

    $customer = New Customer();
    $singlecustomer = $customer->single_customer($_SESSION['CUSID']);
  ?>
    

      <div class="col-sm-3">
 
          <div class="panel">            
            <div class="panel-body">
            <a href="" data-target="#myModal" data-toggle="modal" >
            <img title="profile image" class="img-hover" style="width:200px; height:250px;align:center" src="<?php echo 'customer/'. $singlecustomer->CUSPHOTO; ?>">
            </a>
             </div>
          <ul class="list-group">
          
         
            <!-- <li class="list-group-item text-muted">Profile</li> -->
             <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> <?php echo $singlecustomer->FNAME .' '.$singlecustomer->LNAME; ?> </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span><?php echo date_format(date_create($singlecustomer->DATEJOIN),'M. d, y');?></li>
            <!-- <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li> -->
           
            
          </ul> 
                
        </div>
    </div>
         
        <!--/col-3-->
<div class="col-sm-9"> 

<div class="panel">  
<div class="panel-header">
  <h2>Tracking Order <SMALL><a href="<?php echo web_root; ?>index.php?q=profile" class="btn btn-sm btn-primary"><i class="fa  fa-chevron-left"></i> Back</a></SMALL></h2>
</div>          
  <div class="panel-body">

  
      <div class="table-responsive" style="margin-top:5%;"> 
             <form action="customer/controller.php?action=delete" Method="POST">            
                    <table id="" class="table"  style="font-size:12px" cellspacing="0"  > 
                      <thead>
                        <tr> 
                          <th align="center">Processing</th>
                          <th></th>  
                          <th>Shipping</th>  
                           <th></th> 
                          <th >Delivered</th> 
                        </tr> 
                      </thead>   
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM `tblsummary`  
                          WHERE ORDEREDNUM=".$_GET['id'] ." AND `CUSTOMERID`=".$_SESSION['CUSID'] ;
                          $mydb->setQuery($query);
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          if($result->ORDEREDSTATS=='Pending'){
                          ?>
                          <tr>  

                              <td align=""><h1><span class="label label-danger">0</span></h1></td>
                              <td><h1 style="color:blue">------------</h1></td>
                              <td><h1><span ><i class="fa fa-plane"></i></i></span></h1></td>
                               <td><h1 style="color:skyblue">------------</h1></td>
                              <td><label><h1><i class="fa fa-truck"></i></i></h1></label></td>
                          </tr>
                           


                        <?php
                       }elseif($result->ORDEREDSTATS=='Confirmed'){
                        ?>
                         <tr>   
                              <td align=""><h1><span  class="label label-danger">0</span></h1></td>
                              <td><h1 style="color:blue">------------</h1></td>
                              <td><h1><span class="label label-danger" ><i class="fa fa-plane"></i></i></span></h1></td>
                               <td><h1 style="color:blue">------------</h1></td>
                              <td><label><h1><i class="fa fa-truck"></i></i></h1></label></td>
                          </tr>
                     <?php 
                     }elseif($result->ORDEREDSTATS=='Delivered'){
                        ?>
                         <tr>   
                              <td align=""><h1><span  class="label label-danger">0</span></h1></td>
                              <td><h1 style="color:blue">------------</h1></td>
                              <td><h1><span class="label label-danger" ><i class="fa fa-plane"></i></i></span></h1></td>
                               <td><h1 style="color:blue">------------</h1></td>
                              <td><label><h1><span  class="label label-danger"><i class="fa fa-truck"></i></i></span></h1></label></td>
                          </tr>
                     <?php 
                         }else{
                          ?>
                             <tr>   
                              <td align=""><h1><span  class="label label-default">0</span></h1></td>
                              <td><h1 style="color:skyblue">------------</h1></td>
                              <td><h1><span class="label label-default" ><i class="fa fa-plane"></i></i></span></h1></td>
                               <td><h1 style="color:skyblue">------------</h1></td>
                              <td><label><h1><span  class="label label-default"><i class="fa fa-truck"></i></i></span></h1></label></td>
                          </tr>
                          <tr><td colspan="5" align="center" ><h1><span class="label label-danger"><i class="fa fa-times-circle"></i></span></h1></td></tr>
                     <?php    }
                        } 
                        ?>
                      </tbody>
                      
                      
                    </table>
                 </form>
                 </div>
           </div>
 
</div><!--/col-9--> 
</div>




     <!-- Modal photo -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                </div>

                <form action="customer/controller.php?action=photos" enctype="multipart/form-data" method=
                "post">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="rows">
                        <div class="col-md-12">
                          <div class="rows">
                            <div class="col-md-8">
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
<!--   
  <script>
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
}); 

  </script> -->