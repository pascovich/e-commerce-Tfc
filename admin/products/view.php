<?php  
     if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

    $PROID = $_GET['id'];
    $product = New Product();
    $singleproduct = $product->single_product($PROID);

   
     $category = New Category();
    $singlecategory = $category->single_category($singleproduct->CATEGID);
  ?>
<div class="container">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
        <a data-target="#myModal" data-toggle="modal" href="" title=
            "Click here to Change Image.">
            <img alt="" style="width:600px; height:400px;>" title="" class="img-circle img-thumbnail isTooltip" src="<?php echo $singleproduct->IMAGES; ?>" data-original-title="Usuario"> 
          
          </a>  
        </div>
        <div class="col-md-6">
            <h1><strong>Details du produit</strong></h1><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
               
                    <tr>    
                        <td>
                            <strong>
                                   Produit                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singleproduct->PRONAME.'  '.$singleproduct->PROBRAND.'  '.$singleproduct->PRODESC; ?>     
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
                            <?php echo ': '.$singlecategory->CATEGORIES; ?>  
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
                            <?php echo ': &#8369 '.$singleproduct->PROPRICE; ?> 
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
                            <?php echo ': '.$singleproduct->PROQTY; ?>
                        </td>
                    </tr>
           
                                 
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>
            

     <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                </div>

                <form action="controller.php?action=photos&id=<?php echo $PROID; ?>" enctype="multipart/form-data" method=
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

 