<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }


  $categoryid = $_GET['id'];
  $category = New Category();
  $singlecategory = $category->single_category($categoryid);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
 
              <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Categorie</h1>
          </div> 
       </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="CATEGORY">Categorie:</label>

                      <div class="col-md-8">
                       <input  id="CATEGID" name="CATEGID"   type="HIDDEN" value="<?php echo $singlecategory->CATEGID; ?>">
                         <input class="form-control input-sm" id="CATEGORY" name="CATEGORY" placeholder=
                            "Category" type="text" value="<?php echo $singlecategory->CATEGORIES; ?>">
                      </div>
                    </div>
                  </div>


            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <!-- <a href="index.php" class="btn btn_fixnmix"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                      <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                   
                      </div>
                    </div>
                  </div>

               

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      
 