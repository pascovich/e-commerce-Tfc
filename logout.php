<?php 
require_once 'include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
unset( $_SESSION['CUSID']);
// unset( $_SESSION['USERID'] );
unset( $_SESSION['CUSNAME'] );
unset( $_SESSION['CUSUNAME'] );
unset( $_SESSION['CUSUPASS'] ); 
unset($_SESSION['gcCart']);
unset($_SESSION['gcCart']);
unset( $_SESSION['fixnmixConfiremd']);
unset($_SESSION['gcNotify']);
unset($_SESSION['orderdetails']);

// unset($_SESSION['FIRSTNAME']);
// unset($_SESSION['LASTNAME']);
// unset($_SESSION['ADDRESS']);
// unset($_SESSION['CONTACTNUMBER']);
 	
// 4. Destroy the session
// session_destroy();
redirect("index.php?logout=1");
?> 	 