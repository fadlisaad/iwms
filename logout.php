<?php
	//Stop session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_ID']);
	unset($_SESSION['SESS_USERNAME']);
	unset($_SESSION['SESS_FULLNAME']);
	unset($_SESSION['SESS_EMAIL']);
	unset($_SESSION['SESS_ROLES']);
?>
<!doctype html>  
<html lang="en-us">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
	<meta charset="utf-8">
	<title>Logout</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<!-- The Columnal Grid and mobile stylesheet -->
	<link rel="stylesheet" href="assets/styles/columnal/columnal.css" type="text/css" media="screen" />
	<!-- Fixes for IE -->
	<!--[if lt IE 9]>
            <link rel="stylesheet" href="assets/styles/columnal/ie.css" type="text/css" media="screen" />
            <link rel="stylesheet" href="assets/styles/ie8.css" type="text/css" media="screen" />
            <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
	<![endif]-->
	<!-- Now that all the grids are loaded, we can move on to the actual styles. --> 
        <link rel="stylesheet" href="assets/scripts/jqueryui/jqueryui.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="assets/styles/style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="assets/styles/global.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="assets/styles/config.css" type="text/css" media="screen" />
</head>
<body id="login">
    <div class="container">
        <div class="row">
            <div class="col_6 pre_3">
                <div class="widget clearfix">
                    <h2>Login</h2>
                    <div class="widget_inside">
                        <p class="margin_bottom_15">Enter your username and password to access the system.</p>
						<div class="form">
						<form id="login" action="login-exec.php" method="post">
                            <div class="clearfix">
                                <label>Username</label>
                                <div class="input">
                                    <input type="text" name="username" class="xlarge"/>
                                </div>
                            </div>
                            <div class="clearfix">
                                <label>Password</label>
                                <div class="input">
                                    <input type="password" name="password" class="xlarge"/>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="input no-label">
                                    <input type="checkbox" /> Remember me?
                                </div>
                            </div>
                            <div class="clearfix grey-highlight">
                                <div class="input no-label">
                                    <input type="submit" class="button blue" value="Login" />
                                </div>
                            </div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>