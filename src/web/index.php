<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Resolved
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120205
-->


<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<meta name="description" content="" />
<meta name="keywords" content="" />
<title>RPI Housing</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

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
					//------------------------
					// Sidebar session managment
					//------------------------
					//   + if session is valid then logged in shown
					//   + if session is invalid then inccorect username shown
					//   + if no session then no attempts shown
									
					session_start();
					//Valid
					if(isset($_SESSION['valid_user']) ){
						echo '
						
							<ul>
								<li> <A href="logout.php">Logout</A> </li>
								<li></li>
							</ul>
							
						';
					}

					//No session
					else {
						echo '
							<form id="login-form" name="login-form" action="db_login.php" method="post">
							<h3>Login</h3>
							<ul class="">
								<span id="invalid" class="error"></span>
								<li class="first">
								<span class="label">Email:</span> <input id="username" type="text" name="rcsid" /></li>
								<li><span class="label">Password:</span> <input id="password" type="password" name="password" /></a></li>
								<li><h5><a href="#" id="forgotPass"> Forgot Password? </a></h5></li>
								<li class="last"><input id="login" type="submit" value="Login" /></li>
								
							</ul>
							</form>
						
						';								
					}
					// --------------------------
					// End sidebar login manager
					// --------------------------
				?>
								
			</div>
			
			<div id="sidebar-bottom">
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
<!-- javascript !-->
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/sidebar.js"></script>


</body>
</html>