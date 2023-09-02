<?php

  $query="SELECT count(IMAGES) as 'counts'  FROM `tblpromopro` pr , `tblproduct` p  
  WHERE pr.`PROID`=p.`PROID` and `PROBANNER`=1";
  $mydb->setQuery($query);
  $cur = $mydb->loadResultList(); 
  foreach ($cur as $result) {
  $maxrow = $result->counts; 
  }
 
?>
 

