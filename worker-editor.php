<?php 
/**
 * Copyright 2011 apadmedia.com
 * Developed by: Mohd Fadli Saad
 * This file is part of Memories Catalogue System
 */
 
	//include database connection details
	require_once 'auth.php';
	require_once 'includes/config.php';
	require_once 'includes/class.select.php';
	$select = new select();
	
	/* prevent XSS. */
	$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
	$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

?>
<?php include 'meta.php' ?><body><div id="wrap">	<div id="main">		<header class="container">			<?php include 'header.php' ?>		</header>		<nav class="container">			<?php include 'nav.php' ?>		</nav>
		<div class="container" id="actualbody">
			<div class="row clearfix">
				<div class="col_12">
					<div class="widget clearfix">
						<h2>Worker List</h2>
						<div class="widget_inside">
							<div class="col_12">
								<?php
								// first time submit, process keyword
								if(isset($_GET['action']))
								{
									$action = clean($_GET['action']);
									switch($action)
									{
										// add new event
										case 'add':
											$title 			= '<h3>Add new data</h3>';
											$description 	= 'Add new data into database.';
											
											$form = '<form id="add" name="add" method="post" action="worker-modify.php?action=add">
											<div class="clearfix">
												<label>Company</label>
												<div class="input">'.$select->dropdown('companies').'</div>
											</div>
											<div class="clearfix">
												<label>Passport</label>
												<div class="input"><input id="passport" class="medium validate[required]" type="text" name="passport"/></div>
											</div>
											<div class="clearfix">
												<label>Name</label>
												<div class="input"><input id="fullname" class="xxlarge validate[required]" type="text" name="fullname"/></div>
											</div>
											<div class="clearfix">
												<label>Nationality</label>
												<div class="input">'.$select->dropdown('countries').'</div>
											</div>
											<div class="clearfix">
												<label>Approval Date</label>
												<div class="input"><input id="datepicker1" class="small validate[required]" type="text" name="approval_date"/></div>
											</div>
											<div class="clearfix">
												<label>Reference</label>
												<div class="input"><input id="reference" class="medium validate[required]" type="text" name="reference"/></div>
											</div>
											<div class="clearfix">
												<label>Sector</label>
												<div class="input">'.$select->dropdown('sectors').'</div>
											</div>
											<div class="clearfix">
												<label>Year</label>
												<div class="input">'.$select->dropdown('years').'</div>
											</div>
											<div class="clearfix">
												<label>Note</label>
												<div class="input"><textarea id="note" class="xxlarge validate[required]" name="note" ></textarea></div>
											</div>';
											$form .= '<div class="clearfix grey-highlight">
														<div class="input no-label">
															<input type="submit" class="button blue" value="Add">
															or <b><a href="#" onclick="javascript:history.back(-1)">Cancel</a></b>
														</div>
													</div>';
											$form .= '</form>';
											break;
										// edit
										case 'edit':
											$id 		= clean($_GET['id']);
											$query 		= "SELECT * FROM workers WHERE id = '$id'";
											$result 	= mysql_query($query);
											$post		= mysql_fetch_assoc($result);
											$data 		= unserialize($post['year_id']); 
											$title 		= '<h3>Edit data</h3>';
											$description 	= 'Edit worker details.';
											$form = '<form id="edit" method="post" action="worker-modify.php?id='.$id.'&action=edit">
											<div class="clearfix">
												<label>Company</label>
												<div class="input">'.$select->drop_edit('companies',$post['company_id']).'</div>
												
											</div>
											<div class="clearfix">
												<label>Passport</label>
												<div class="input"><input id="passport" class="medium validate[required]" type="text" name="passport" value="'.$post['passport'].'"/></div>
											</div>
											<div class="clearfix">
												<label>Name</label>
												<div class="input"><input id="fullname" class="xxlarge validate[required]" type="text" name="fullname" value="'.$post['fullname'].'"/></div>
											</div>
											<div class="clearfix">
												<label>Nationality</label>
												<div class="input">'.$select->drop_edit('countries',$post['country_id']).'</div>
											</div>
											<div class="clearfix">
												<label>Approval Date</label>
												<div class="input"><input id="datepicker1" class="small validate[required]" type="text" name="approval_date" value="'.$post['approval_date'].'"/></div>
											</div>
											<div class="clearfix">
												<label>Reference</label>
												<div class="input"><input id="reference" class="medium validate[required]" type="text" name="reference" value="'.$post['reference'].'"/></div>
											</div>
											<div class="clearfix">
												<label>Sector</label>
												<div class="input">'.$select->drop_edit('sectors',$post['sector_id']).'</div>
											</div>
											<div class="clearfix">
												<label>Year</label>
												<div class="input">';
													$current_year = date('Y');
														for($year = 2011; $year <= $current_year; $year++) 
														{
															if(in_array($year,$data))
															{
																$checked="CHECKED";
															} else { 
																$checked="";
															}
															$form .= '<input type="checkbox" value='.$year.' name="years[]" '.$checked.'>'.$year.'</input><br />';
														}
												$form .= '</div>
											</div>
											<div class="clearfix">
												<label>Note</label>
												<div class="input"><textarea id="note" class="xxlarge validate[required]" name="note" >'.$post['note'].'</textarea></div>
											</div>
											<div class="clearfix grey-highlight">
												<div class="input no-label">
													<input type="submit" class="button blue" value="Edit" />
													or <b><a href="#" onclick="javascript:history.back(-1)">Cancel</a></b>
												</div>
											</div>
											</form>';
										break;
										// view
										case 'view':
											$id 		= clean($_GET['id']);
											$query 		= "SELECT * FROM view_worker WHERE id = '$id'";
											$result 	= mysql_query($query);
											$post		= mysql_fetch_assoc($result);
											$data 		= unserialize($post['year_id']); 
											$title 		= '<h3>View</h3>';
											$description 	= 'View worker details.';
											$form = '<div class="clearfix">
												<label>Company</label>
												<div class="input"><input id="company" class="xxlarge" type="text" name="company" value="'.$post['company'].'" disabled="disabled"/></div>
											</div>
											<div class="clearfix">
												<label>Passport</label>
												<div class="input"><input id="passport" class="medium" type="text" name="passport" value="'.$post['passport'].'" disabled="disabled"/></div>
											</div>
											<div class="clearfix">
												<label>Name</label>
												<div class="input"><input id="fullname" class="xxlarge validate[required]" type="text" name="fullname" value="'.$post['fullname'].'" disabled="disabled"/></div>
											</div>
											<div class="clearfix">
												<label>Nationality</label>
												<div class="input"><input id="country" class="medium validate[required]" type="text" name="country" value="'.$post['country'].'" disabled="disabled"/></div>
											</div>
											<div class="clearfix">
												<label>Approval Date</label>
												<div class="input"><input id="datepicker1" class="small validate[required]" type="text" name="approval_date" value="'.$post['approval_date'].'" disabled="disabled"/></div>
											</div>
											<div class="clearfix">
												<label>Reference</label>
												<div class="input"><input id="reference" class="medium validate[required]" type="text" name="reference" value="'.$post['reference'].'" disabled="disabled"/></div>
											</div>
											<div class="clearfix">
												<label>Sector</label>
												<div class="input"><input id="sector" class="medium validate[required]" type="text" name="sector" value="'.$post['sector'].'" disabled="disabled"/></div>
											</div>
											
											<div class="clearfix">
												<label>Year</label>
												<div class="input">';
													$current_year = date('Y');
														for($year = 2011; $year <= $current_year; $year++) 
														{
															if(in_array($year,$data))
															{
																$checked="CHECKED";
															} else { 
																$checked="";
															}
															$form .= '<input type="checkbox" value='.$year.' name="year[]" '.$checked.' disabled="disabled">'.$year.'</input><br />';
														}
												$form .= '</div>
											</div>
											<div class="clearfix">
												<label>Note</label>
												<div class="input"><textarea id="note" class="xxlarge validate[required]" name="note" disabled="disabled">'.$post['note'].'</textarea></div>
											</div>
											<div class="clearfix grey-highlight">
												<div class="input no-label">
													<input type="submit" class="button blue" value="OK" onclick="javascript:history.back(-1)"/>
												</div>
											</div>
											</form>';
										break;
										default:
											return false;
									}
								}
								else
								{
									header("location: worker.php");
									exit();
								} ?>
							<div class="col_4">
								<h3><?php echo $title ?></h3>
								<p><?php echo $description ?></p>
							</div>
							<div class="col_8 last">
								<div class="form">
								<?php echo $form ?>
								</div>
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