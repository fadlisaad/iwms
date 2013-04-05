<?php
/**
 * Description : main script for login processing.
 */
	//Start session
	session_start();
	
	//Include database connection details
	include("includes/config.php");
	
	if(isset($_POST['username']) && (isset($_POST['password']))){
		//Sanitize the POST values
		$login 		= clean($_REQUEST['username']);
		$password 	= clean(md5($_REQUEST['password']));
		
		try {
			$q = "SELECT * FROM users WHERE username = :login AND password = :password LIMIT 1";
			$q_do = $db->prepare($q);
			$q_do->bindParam(':login', $login, PDO::PARAM_STR);
			$q_do->bindParam(':password', $password, PDO::PARAM_STR);
			$q_do->execute();
			$n2 = $db->query("SELECT FOUND_ROWS()")->fetchColumn();
		} catch(PDOException $e) {
			$log->logError($e." - ".basename(__FILE__));
		}
		
		if(!$n2) {
			//Login failed
			header("location: index.php");
			exit();
		}else{
			$f = $q_do->fetch(PDO::FETCH_ASSOC);
			
			session_regenerate_id();
			$_SESSION['SESS_ID'] 		= clean($f['id']);
			$_SESSION['SESS_USERNAME'] 	= clean($f['username']);
			$_SESSION['SESS_FULLNAME'] 	= clean($f['fullname']);
			$_SESSION['SESS_ROLES'] 	= clean($f['role']);
			session_write_close();
			
			if($_SESSION['SESS_ROLES'] == 'user') {
				header("location: worker.php?role=user");
			}
			if($_SESSION['SESS_ROLES'] == 'admin'){
				header("location: worker.php?role=admin");
			}
			exit();
		}
	}else{
		header("location: index.php");
		exit();
	}
?>