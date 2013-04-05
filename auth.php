<?php
/*
 * Description : main script for authentication.
 */
	//Start session
	session_start();
	$role = $_SESSION['SESS_ROLES'];
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_ID']) || (trim($_SESSION['SESS_ID']) == '')) {
		header("location: index.php");
		exit();
	}
?>