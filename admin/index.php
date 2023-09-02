<?php 
require_once("../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/login.php");
     } 

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        $title="Products";	
		$content='products/';		
		break;	
	default :
	 //    $title="Products";	
		// $content ='products/';		
	redirect("products/");
}
require_once("theme/templates.php");
?>