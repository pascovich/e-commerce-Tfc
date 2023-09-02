<?php 
function get_categories(){
	$mydb->setQuery("SELECT * FROM `tblcategory`");
	$cur = $mydb->loadResultList();

	foreach ($cur as $result) {
		echo '<ul>
				<li><a href="index.php?q=product&category='.$result->CATEGORIES.'" >'.$result->CATEGORIES.'</a></li> 
			</ul>';
	}
}


?>