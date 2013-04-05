<?php 
/**
 * Copyright 2013 apadmedia.com
 * Developed by: Mohd Fadli Saad
 * This file is part of IWMS
 */
	
	//include database connection details
	require_once 'auth.php';
	include_once 'includes/config.php';
	
	// first time submit, process keyword
	if(isset($_GET['action']) && (!empty($_POST)))
	{
		$action 		= $_GET['action'];
		$f_company 		= $_POST['companies'];
		$f_passport 	= $_POST['passport'];
		$f_fullname 	= $_POST['fullname'];
		$f_country 		= $_POST['countries'];
		$f_approval		= $_POST['approval_date'];
		$f_reference 	= $_POST['reference'];
		$f_sector 		= $_POST['sectors'];
		$f_year 		= $_POST['years'];
		$f_note 		= $_POST['note'];
		$serialized_year = serialize($f_year);
		
		switch($action)
		{
			// add data
			case 'add':						
				$query 	= "INSERT INTO workers (company_id, passport, fullname, country_id, approval_date, reference, sector_id, year_id, note)";
				$query 	.= " VALUES ('$f_company', '$f_passport', '$f_fullname', '$f_country', '$f_approval', '$f_reference', '$f_sector', '$serialized_year,'$note'')";
				$result = mysql_query($query);
				break;
			// edit data
			case 'edit':
				$id 	= $_GET['id'];
				$query 	= "UPDATE workers";
				$query 	.= " SET company_id = '$f_company', passport = '$f_passport', fullname = '$f_fullname', country_id = '$f_country', approval_date = '$f_approval', reference = '$f_reference', sector_id = '$f_sector', year_id = '$serialized_year', note = '$f_note' WHERE id = '$id'";
				$result = mysql_query($query);
				break;
		}
		
		if($result) {
			$output = "success";
			header("location: worker.php?action=".$action."&output=".$output);
		}
		else {
			$output = "failed";
			header("location: worker.php?action=".$action."&output=".$output);
		}
	}
	else
	{
		header("location: worker.php");
		exit();
	}
?>