<?php
   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

?> 
        <form class="form-horizontal span6" action="" method="POST"  />
          <fieldset>
            <legend>Ajouter nouvelle commande </legend> 
         
          <table class="table table-hover" id="fixnmix">
              <thead>
                <tr >
                  <th>No.#</th>
                  <th>Produit</th>
                  <th>Description</th>
                  <th align="center">Quantite</th>
                  <th align="center">Prix</th>
                  <th></th>
                </tr>
              </thead> 
              <tbody>
                <?php  
                  $query = "SELECT * FROM `tblproducts` p  ,`tblcategory` c 
                        WHERE   p.`CATEGORYID`=c.`CATEGORYID` and STATUS='Available'";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();

                  foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td width="5%" align="center"></td>';
                    echo '<td> <a href=""><img src="'.web_root.'admin/modules/product/'. $result->IMAGES.'" width="60" height="60" title="'.$result->PRODUCTNAME.'"/></a></td>';
                    echo '<td >' . $result->PRODUCTNAME.'</td>';
                    echo '<td align="center">'. $result->QTY.'</td>';
                    echo '<td align="center"> &#8369 '. $result->PRICE.'</td>';
                    // echo '<td align="left">
                    // <a href="controller.php?action=cartadd&id='.$result->PRODUCTID.'&price='.$result->PRICE.'" class="btn btn_fixnmix btn-xs"><strong>Add to Cart</strong></a></td>';
                      echo '<td align="left">
                    <a href="index.php?view=addtocart"   data-id="'.$result->PRODUCTID.'" class="btn btn_fixnmix btn-xs MAINorder"><strong>Add to Cart</strong></a></td>';
                    //  echo '<td align="left">
                    // <a href="" data-target="#CART" data-toggle="modal"  data-id="'.$result->PRODUCTID.'" class="btn btn_fixnmix btn-xs MAINorder"><strong>Add to Cart</strong></a></td>';
                    echo '</tr>';
                  } 
                  ?>
              </tbody>            
            </table>
            </div><br/>
           </form>
       