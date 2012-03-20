


<div id="post1">
	<h2>Welcome to RPI Housing</h2>
	If you would like to participate in the RPI Housing Lottery you must first blah blah blah

</div>
<div id="post2">
	
	<?php
		//-------------------------------
		//	homepage session managment
		//-------------------------------
		session_start();
		
		//Valid
		if($_SESSION['auth'] == true ){
	?>		
		<h2>Welcome, <?php echo $_SESSION['user'] ?></h2>				
		<ul>
			<li><h4>Account Settings:</h4></li>
			<li><a href="?logout=">User Logout</a></li>
			<li><a href="#" id="lotteryStatus" >Lottery Status</a></li>
			<li><a href="#" id="viewQueue" >View Queue</a></li>
			<li><a href="#" id="roomInvites" >Room Invites</a></li>
			<li><a href="#" id="searchFriends" >Search Friends</a></li>
		</ul>			
	<?php
		//Invalid/No session
		} else {
	?>						
		<h2>Sign up for the housing lottery</h2>
		<h4>Login in on the right to recieve a lottery number!</h4>
	<?php				
	}			
	?>

	
	<div id="dialog-message"></div>
	<script type="text/javascript" src="data/javascript/homepage.js"></script>
</div>
<br class="clearfix" />