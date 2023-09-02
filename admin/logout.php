<?php 
require_once '../include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
unset( $_SESSION['USERID'] );
unset( $_SESSION['U_NAME'] );
unset( $_SESSION['U_USERNAME'] );
unset( $_SESSION['U_PASS'] );
unset( $_SESSION['U_ROLE'] ); 
// 4. Destroy the session
// session_destroy();
redirect(web_root."admin/login.php?logout=1");
?>