
<div id="post1">
	<h2>Welcome to RPI Housing</h2>
	As a student you may log in using your RCSID and view a live display showing room occupancy and your current status.

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
				<li><a href="#" id="adminCheckStatus" >Check Students Room Status</a></li>
			</ul>	
	
		<?php } ?>
	
	<?php } else { ?>
	
		<h2>Sign in to enhance your experience</h2>
		
		
	<?php } ?>
	
	<div id="dialog-message1"></div>
	<div id="dialog-message2"></div>
	<div id="dialog-message3"></div>
	<script type="text/javascript" src="data/javascript/homepage.js"></script>
</div>
<br class="clearfix" />