<?php
namespace Dompdf;
require_once("../../include/initialize.php");


require_once '../report/print/dompdf/autoload.inc.php';
// include '../database/connect.php';
//checkAdmin();
	# code...
if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

	$header=$view;
	$title="Clients"; 
	switch ($view) {

	case 'list' :
	 
		$content    = 'list.php';		
		break;

	case 'add' : 
		$content    = 'add.php';		
		break;

	case 'edit' : 
		$content    = 'edit.php';		
		break;

	case 'view' : 
		$content    = 'view.php';
		break;
  

  	default :
	$title="Clients";
		$content    = 'list.php';
	}


   
 
require_once ("../theme/templates.php");
?>
  
