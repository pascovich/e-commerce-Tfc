<?php
require_once ("../../include/initialize.php");
	 

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;

	case 'editStatus' :
	editStatus();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;`

	case 'banner' :
	setBanner();
	break;

 case 'discount' :
	setDiscount();
	break;
	}

   
function doInsert(){
	if(isset($_POST['save'])){
		
	  


  				 	 	$product = New Setting();  
						$product->PLACE 		= $_POST['PLACE']; 
						$product->BRGY 			= $_POST['BRGY']; 
						$product->DELPRICE 		= $_POST['DELPRICE']; 
						$product->create(); 
   
						message("New location created successfully!", "success");
						redirect("index.php");
		 
				 
		  }


	  }
 
 
	function doEdit(){
 


		if(isset($_POST['save'])){
 
					
  				 	 	$product = New Setting();  
						$product->PLACE 		= $_POST['PLACE']; 
						$product->BRGY 			= $_POST['BRGY'];  
						$product->DELPRICE 		= $_POST['DELPRICE']; 
						$product->update($_POST['SETTINGID']);
  

			message("L’emplacement a été mis à jour!", "success");
			redirect("index.php");
	  }
	redirect("index.php"); 
}

 function editStatus(){
 	
	if (@$_GET['stats']=='NotAvailable'){
		$product = New Product();
		$product->PROSTATS	= 'Available';
		$product->update(@$_GET['id']);

	}elseif(@$_GET['stats']=='Available'){
		$product = New Product();
		$product->PROSTATS	= 'NotAvailable';
		$product->update(@$_GET['id']);
	}else{

		if (isset($_GET['front'])){
			$product = New Product();
			$product->FRONTPAGE	= True;
			$product->update(@$_GET['id']);

		}
	}

	redirect("index.php");

 }
		 
	 
	function setBanner(){
		$promo = New Promo();
		$promo->PROBANNER  =1;  
		$promo->update($_POST['PROID']);

	}

 	function setDiscount(){
 		if (isset($_POST['submit'])){

		$promo = New Promo();
		$promo->PRODISCOUNT  = $_POST['PRODISCOUNT']; 
		$promo->PRODISPRICE  = $_POST['PRODISPRICE']; 
		$promo->PROBANNER  =1;    
		$promo->update($_POST['PROID']);

		msgBox("La remise a été fixée.");

		redirect("index.php"); 
 		}
	
	}
	 
?>