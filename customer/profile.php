<?php  
 
       if (!isset($_SESSION['CUSID'])){
      redirect("index.php");
     }


     // if($_SESSION['fixnmixConfiremd']>0){
     //   $query = "update `tblpayment` SET `HVIEW` = true WHERE `CUSTOMERID`='".$_SESSION['CUSID']."' AND STATS in ('Confirmed','Cancelled')  AND HVIEW=0";
     //    mysql_query($query);
     // }
    

     $customer = New Customer();
      $res = $customer->single_customer($_SESSION['CUSID']);
    ?>
<section>
    <div class="container">
         <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Profile</li>
        </ol>
      </div>
        <div class="row">
    <div class="col-sm-3">
        <div class="panel">
            <div class="panel-body">
                <a data-target="#myModal" data-toggle="modal" href=
                ""><img class="img-hover" src="<?php echo web_root. "customer/".$res->CUSPHOTO; ?>"
                style="width:100%; height:100%;text-align:center" title=
                "profile image"></a>
            </div>
            <ul class="list-group">
            <!-- <li class="list-group-item text-muted">Profile</li> -->
                <li class="list-group-item text-right"><span class=
                "pull-left"><strong>Real name</strong></span>
                <?php echo $res->FNAME .' '.$res->LNAME; ?></li>
                <li class="list-group-item text-right"> 
                <div class="panel-group" id="accordion">   
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"  >Change Password</a>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="<?php echo web_root; ?>customer/controller.php?action=changepassword" method="POST"> 
                          <input type="password" class="form-control" name="CUSPASS" required placeholder="Password"><br/>
                          <input class="btn btn-sm btn-primary" type="submit" name="save"  value="Change">
                        </form>
                      </div>
                  </div>
                </div> 
                </li>
            </ul>
        </div>
    </div><!--/col-3-->
    <div class="col-sm-9">
        <div class="panel">
            <div class="panel-body">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#home">List of Orders</a>
                    </li> 
                    <li>
                        <a data-toggle="tab" href="#settings">Update
                        Account</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#wishlist">WishList</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <?php
                            check_message();
                              
                            ?>
                        <div class="table-responsive" style="margin-top:5%;">
                            <form action=
                            "customer/controller.php?action=delete" method=
                            "post">
                                <table cellspacing="0" class=
                                "table table-striped table-bordered table-hover"
                                id="example" style="font-size:12px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order#</th>
                                            <th>Date Oredered</th>
                                            <th>TotalPrice</th>
                                            <th>PaymentMethod</th>
                                            <th>Status</th>
                                            <th width="150px">Remarks</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                                    $query = "SELECT * FROM `tblsummary`  
                                                                  WHERE  `CUSTOMERID`=".$_SESSION['CUSID'] ." ORDER BY   `ORDEREDNUM` desc ";
                                                                  $mydb->setQuery($query);
                                                                  $cur = $mydb->loadResultList();

                                                                foreach ($cur as $result) {
                                                                  ?>
                                        <tr>
                                            <td width="5%"></td>
                                            <!--   <td width="10%"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDEREDNUM; ?>">
                            <a href="#"  title="View list Of ordered products"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDEREDNUM; ?>"><i class="fa fa-info-circle fa-fw"></i> view orders</a> 
                         </td> -->
                                            <!-- <td> <a href="#" class="get-id"  data-target="#myModal" data-toggle="modal" data-id="<?php echo  $result->ORDERNUMBER; ?>"><?php echo  $result->ORDERNUMBER; ?></a>
                               </td> -->
                                            <td>
                                            <?php echo  $result->ORDEREDNUM; ?>
                                            <!-- <a href="#"  title="View list Of ordered products"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDEREDNUM; ?>"><i class="fa fa-info-circle fa-fw"></i><?php echo  $result->ORDEREDNUM; ?></a> --></td>
                                            <td>
                                            <?php echo date_format(date_create($result->ORDEREDDATE),"M/d/Y h:i:s") ; ?></td>
                                            <td>&#8369
                                            <?php echo  $result->PAYMENT; ?></td>
                                            <td>
                                            <?php echo  $result->PAYMENTMETHOD; ?></td>
                                            <td>
                                            <?php echo  $result->ORDEREDSTATS; ?></td>
                                            <td>
                                            <?php echo  $result->ORDEREDREMARKS; ?></td>
                                            <td class="tooltip-demo">
                                                <a class=
                                                "orderid btn btn-pup btn-xs"
                                                data-id=
                                                "<?php echo $result->ORDEREDNUM; ?>"
                                                data-target="#myOrdered"
                                                data-toggle="modal" href="#"
                                                title=
                                                "View list Of ordered products">
                                                <i class=
                                                "fa fa-info-circle fa-fw"
                                                data-placement="left"
                                                data-toggle="tooltip" title=
                                                "View Order"></i> <span class=
                                                "tooltip tooltip.top">view</span></a>
                                            
                                            </td>
                                        </tr><?php
                                                                       
                                                                        } 
                                                                        ?>
                                    </tbody>
                                </table>
                            </form> 
                        </div><!--/table-resp-->
                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="settings">
                        <?php include  "signup.php" ?>
                    </div><!--/tab-pane-->
                      <div class="tab-pane" id="wishlist">
                        <?php include  "wishlist.php" ?>
                    </div><!--/tab-pane-->
                </div><!--/tab-content-->
            </div>
        </div><!--/col-9-->
    </div><!-- Modal photo -->
    <div class="modal fade" id="myModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type=
                    "button">×</button>
                    <h4 class="modal-title" id="myModalLabel">Choose
                    Image.</h4>
                </div>
                <form action="customer/controller.php?action=photos" enctype=
                "multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="rows">
                                <div class="col-md-12">
                                    <div class="rows">
                                        <div class="col-md-8">
                                            <input name="MAX_FILE_SIZE" type=
                                            "hidden" value="1000000">
                                            <input id="photo" name="photo"
                                            type="file">
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal"
                        type="button">Close</button> <button class=
                        "btn btn-pup" name="savephoto" type="submit">Upload
                        Photo</button>
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
  </div>
  </div>
</section>