
<div id="post1">
	<h2>Welcome to RPI Housing</h2>
	If you would like to participate in the RPI Housing Lottery you must first blah blah blah

</div>
<div id="post2">
	
	<?php session_start();
		  if( $_SESSION['auth']){ ?>	
		  
		<h2>Welcome, <?php echo $_SESSION['user'] ?></h2>				
		<ul>
			<li><h4>Account Settings:</h4></li>
			<li><a href="?logout=">Logout</a></li>
			<li><a href="#" id="roomStatus" >Room Status</a></li>

		</ul>	
		<?php if ($_SESSION['admin']) { ?>
	
			<ul>
				<li><h4>Admin Account Settings:</h4></li>
				<li><a href="#" id="createAdmin" >Create New Admin</a></li>
				<li><a href="#" id="registerStudent" >Register Student for Room</a></li>
			</ul>	
	
		<?php } ?>
	
	<?php } else { ?>
	
		<h2>Sign up for the housing lottery</h2>
		<h4>Login in on the right to recieve a lottery number!</h4>
		
	<?php } ?>
	
	<div id="dialog-message"></div>
	<script type="text/javascript" src="data/javascript/homepage.js"></script>
</div>
<br class="clearfix" />