  <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
 
                 <?php 
                      $mydb->setQuery("SELECT * FROM `tblcategory`");
                      $cur = $mydb->loadResultList();
                     foreach ($cur as $result) {
                      echo ' <div class="categ panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title"><a href="index.php?q=product&category='.$result->CATEGORIES.'" >'.$result->CATEGORIES.'</a></h4>
                            </div>
                          </div>';
                      }
                  ?>
              
            </div><!--/category-products-->
 
            <div class="shipping text-center"><!--shipping-->
              <img src="images/home/shipping.jpg" alt="" />
            </div><!--/shipping-->
          
          </div>

 