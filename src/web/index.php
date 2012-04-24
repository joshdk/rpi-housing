<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<?php

	//include_once($_SERVER['DOCUMENT_ROOT'] . '.../web/data/CAS.php');
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/CAS.php');
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/config.php');
	include_once( 'data/PHP/users.php' );
	
	$casfn = new cas();
	
	phpCAS::setDebug();

	//Connect to CAS server
	$casfn->connect($CAS);

	//Logout
	if ( isset($_REQUEST['logout'])) {
		Users::logout( $casfn );
	}

	//Login
	if (isset($_REQUEST['login'])) {
		Users::login( $casfn );
	}
	
	Users::verfiyUser( $casfn );

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>RPI Housing</title>
	<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="data/CSS/style.css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" /> 

</head>
<body>

<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">rpi housing</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li id="homepage" class=""><a href="#">Homepage</a></li>
				<li><a id="buildings" href="#">buildings</a></li>
				<li><a id="search" href="#">search</a></li>
				<li><a id="help" href="#">help</a></li>
				<li id="contact" class="last"><a href="#">Contact</a></li>
			</ul>
			<br class="clearfix" />
		</div>
	</div>
	<div id="page">
		<div id="content">
			
			Main content goes here!
			
		</div>
		<div id="sidebar">

			<div id="sidebar-top">
			
				<?php
					//Logged In
					if ($_SESSION['auth'] == true) {				
				?>
					<h3><?php echo $_SESSION['user'] ?> is logged in</h3>
					<ul>
						<li> <A href="?logout=">Logout</A> </li>
						<li></li>
					</ul>
							
						
				<?php
					//Not Logged In
					} else {
				?>
					<h3>Login</h3>
					<ul>
						<li> <A href="?login=">Click Here to Login</A> </li>
						<li></li>
					</ul>	
				<?php
					}
				?>
								
			</div>
			
			<div id="sidebar-bottom">
				<!--
				<h3>Quick Search</h3>
				
				<ul class="">
					<li><span class="label">Building:</span> 
					
						<select id="quick-building" name="building" class="dropdown">
							<option value="all">All</option>
							<option value="blitman">Blitman Residence Commons</option>
							<option value="barh">Burdett Avenue Residence Hall</option>
							<option value="colonie">Colonie Apartments</option>
							<option value="davison">Davison Hall</option>
							<option value="ecomplex">E-Complex</option>
							<option value="north">North Hall</option>
							<option value="nugent">Nugent Hall</option>
							<option value="polytech">Polytechnic Residence Commons</option>
							<option value="quad">Quadrangle (The Quad)</option>
							<option value="sharp">Sharp Hall</option>
							<option value="rahp">Single RAHP</option>
							<option value="stacwyck">Stacwyck Apartments</option>
							<option value="Warren">Warren Hall</option>
						</select>
					
					</li>
					<li class="last"><input id="quick-search" type="submit" value="Search" /></li>
				</ul>
				-->
			</div>
			
		</div>
		<br class="clearfix" />
	</div>
</div>
<div id="footer">
	cCopyright (c) 2012 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">CSS Templates</a>.
</div>

<!-- jquery !-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>

<!-- javascript !-->
<script type="text/javascript" src="data/javascript/menu.js"></script>
<script type="text/javascript" src="data/javascript/sidebar.js"></script>


</body>
</html>