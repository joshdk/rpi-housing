<?php

//Variables
$username=$_POST['username'];
$password='welcome';

//Connect to database
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=test") or  die('Could not connect !<br />Please contact the site\'s administrator.');

//Check - Email not blank
if(empty($username)){ 
	die("Please enter your email!"); 
} 

if (!preg_match("/([\w\-]+\@rpi.edu)/",$username))
{
    die("E-mail address not valid: Must use RPI email address!<br />Ex. smithj@rpi.edu");
}

// Check - Email Already Registered
$user_check = pg_query("SELECT username FROM members WHERE username='$username'"); 
$do_user_check = pg_num_rows($user_check); 
if($do_user_check > 0){ 
	die("Already Registered"); 
} 

//Hash Password
$hash = hash('sha256', $password);


$sql="INSERT INTO members VALUES ( '$username', '$hash' ); ";
$result=pg_query($sql);

echo 'You have succesfully been signed up for the RPI housing lottery, you should recieve and e-mail with your password within the next few minutes!';

?>