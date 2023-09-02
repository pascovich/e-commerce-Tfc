<?php  

    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

 if (isset($_GET['id'])){
  @$ID = $_GET['id'];
  $setting = New Setting();
  $set = $setting->single_setting($ID);

 ?>
 

<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Definir la remise</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

 
            
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PLACE">Location:</label>

                      <div class="col-md-8">
                      <input  type="hidden" name="SETTINGID"  value="<?php echo $set->SETTINGID ?>">
                             <input class="form-control input-sm" id="PLACE" name="PLACE" placeholder=
                            "Location" type="text" value="<?php echo $set->PLACE ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BRGY">Town:</label>

                      <div class="col-md-8">
                      <input  type="hidden" name="SETTINGID"  value="<?php echo $set->SETTINGID ?>">
                             <input class="form-control input-sm" id="BRGY" name="BRGY" placeholder=
                            "Location" type="text" value="<?php echo $set->BRGY ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DELPRICE">Prix:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="DELPRICE" name="DELPRICE" placeholder=
                            "Delivery Price" type="text" value="<?php echo $set->DELPRICE ?>">
                      </div>
                    </div>
                  </div>

                
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      </div>
                    </div>
                  </div>

               
    
          
        </form>
      

       


 <?php }else{ ?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Definir la livraison</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

 
            
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PLACE">Location:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="PLACE" name="PLACE" placeholder=
                            "Location" type="text" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BRGY">Place:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="BRGY" name="BRGY" placeholder=
                            "Location" type="text" value="">
                      </div>
                    </div>
                  </div>

                      <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DELPRICE">Prix:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="DELPRICE" name="DELPRICE" placeholder=
                            "Delivery Price" type="text" value="">
                      </div>
                    </div>
                  </div>

                
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      </div>
                    </div>
                  </div>

               
    
          
        </form>
      

       
<?php   }

?>





