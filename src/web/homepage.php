<div id="post1">
	<h2>Welcome to RPI Housing</h2>
	If you would like to participate in the RPI Housing Lottery you must first sign up
	below using your RPI email address. You will then be emailed a password to log into
	your user account where you can view your lottery number once it has been chosen. 
	You will also be allowed to add housing choices to your queue which will allow you to
	choose your housing preferences long before the actual housing pick. For more information
	please go to our help page where you can read a full description and tutorial.

</div>
<div id="post2">
	
	<?php
		//-------------------------------
		//	homepage session managment
		//-------------------------------
		session_start();
		
		//Valid
		if(isset($_SESSION['valid_user']) ){
			echo'
			
				<h2>Welcome, '.$_SESSION['valid_user'].'</h2>
				
				<ul>
					<li><h4>Account Settings:</h4></li>
					<li><a href="logout.php">User Logout</a></li>
					<li><a href="#">Change Password</a></li>
			';
					if(isset($_SESSION['phone_number']) )
						echo '<li><a href="#">Dont Text Me When My Time Bengins</a></li>';
					else
						echo '<li><a href="#">Text Me When My Time Bengins</a></li>';
			echo '
					<li><a href="#">Remove From Lottery</a></li>
				</ul>
			
			';		
		}
		//Invalid/No session
		else {
			echo '
				<form id="signup-form" name="signup-form" action="db_register.php" method="post">			
				
					<h2>Sign up for the housing lottery</h2>
					<h4>Enter your RPI email below to recieve a lottery number!</h4>
					<span class="centered">
					<input id="email" type="text" name="rcsid" />
					<input id="signup" name="Submit" type="submit" value="Signup" />
					</span>
					<h5>You will recieve an email with your login details soon after</h5>
					<h5 id="message" class="error"></h5>
				</form>
			
			';
		}
		//--------------------------------
		// End homepage session managment
		//--------------------------------
	?>
	
	
</div>
<br class="clearfix" />