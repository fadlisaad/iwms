<?php 
/**
 * Copyright 2013 apadmedia.com
 * Developed by: Mohd Fadli Saad
 * This file is part of IWMS
 */
 
	require_once 'auth.php';
	require_once 'includes/config.php';
	
	//select all company
	$query_c 	= "select * from companies";
	$result_c 	= mysql_query($query_c) or die(mysql_error());
	$data_c		= mysql_fetch_assoc($result_c) or die(mysql_error());
	
	//select all event
	if(isset($_GET['company']) && (!empty($_GET['company'])))
	{
		$id		= $_GET['company'];
		$query 	= "select * from view_worker where company_id = ".$id;
	} else {
		$query 	= "select * from view_worker";
	}
		$result = mysql_query($query) or die(mysql_error());
		$data	= mysql_fetch_assoc($result) or die(mysql_error());
		$list 	= array(); 
	
	//check if user has submit the action (edit, delete)
	if(isset($_GET['output']) && (!empty($_GET['output'])))
	{
		// check the output
		$output = $_GET['output'];
		$action = $_GET['action'];
		
		switch($action)
		{
			// add new event
			case 'add':
				if($output == 'success')
					$notification = '<span class="notification done"> The data has been successfully added! </span>';
				else if($output == 'failed')
					$notification = '<span class="notification undone"> The data has failed to be added. Please try again </span>';
			break;
			// edit data
			case 'edit':
				if($output == 'success')
					$notification = '<span class="notification done"> The data has been successfully edited! </span>';
				else if($output == 'failed')
					$notification = '<span class="notification undone"> There is an error happened. Try again or notify your admin about this </span>';
			break;
			// delete data
			case 'delete':
				if($output == 'success')
					$notification = '<span class="notification done"> The data has been deleted. </span>';
				else if($output == 'failed')
					$notification = '<span class="notification undone"> There is an error happened while deleting the data. </span>';
			break;
		}
	}
	// load original
	else
		$notification = '<span class="notification information"> List of existing data</span>';
?>
<?php include 'meta.php' ?>
<body>
<div id="wrap">
	<div id="main">
		<header class="container">
			<?php include 'header.php' ?>
		</header>
		<nav class="container">
			<?php include 'nav.php' ?>
		</nav>
		<div class="container" id="actualbody">
			<div class="row clearfix">
				<div class="col_12">
					<div class="widget clearfix">
						<h2>Worker Catalogue</h2>
						<div class="widget_inside">
							<div class="col_12">
								<?php echo $notification ?>
								<div class="clearfix">
									<br />
									<?php do { ?>
										<a class="blue button" href="worker.php?company=<?php echo $data_c['id'] ?>"><span><?php echo $data_c['name'] ?></span></a>
									<?php } while($data_c = mysql_fetch_assoc($result_c)) ?>
									<br /><br /><br />
								</div>
								<table class="dataTable">
									<thead>
										<tr>
											<th class="align-left">Company</th>
											<th class="align-left">Passport</th>
											<th class="align-left">Name</th>
											<th class="align-left">Nationality</th>
											<th class="align-left">Approval Date</th>
											<th class="align-left">Reference</th>
											<th class="align-left">Sector</th>
											<th>Details</th>
										</tr>
									</thead>
									<tbody>
									<?php do { ?>
										<tr>
											<td><?php echo $data['company'] ?></td>
											<td><?php echo $data['passport'] ?></td>
											<td><?php echo $data['fullname'] ?></td>
											<td><?php echo $data['country'] ?></td>
											<td><?php echo $data['approval_date'] ?></td>
											<td><?php echo $data['reference'] ?></td>
											<td><?php echo $data['sector'] ?></td>
											<td class="center">
											<?php if($role == 'admin') { ?>
												<a href="worker-editor.php?action=edit&id=<?php echo $data['id'] ?>">Edit</a> | 
												<a href="worker-editor.php?action=view&id=<?php echo $data['id'] ?>">View</a>
											<?php } else { ?>
												<a href="worker-editor.php?action=view&id=<?php echo $data['id'] ?>">View</a>
											<?php } ?>
											</td>
										</tr>
									<?php } while($data = mysql_fetch_assoc($result)) ?>
									</tbody>
								</table>
								<br /><br />
								<a class="black button" href="worker-editor.php?action=add"><span>Add new data</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div><!--container -->
    </div>
</div>

<footer>
   <?php include 'footer.php' ?>
</footer>
</body>
</html>
