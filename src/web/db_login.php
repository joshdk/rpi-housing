<?php

session_start();

$username=$_POST['username'];
$password=$_POST['password'];

// This would be a good time to sanatize the inputs


//Hash
$password = hash('sha256', $password);


//Connect
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=test") or  die('Could not connect !<br />Please contact the site\'s administrator.');


$sql="SELECT * FROM members WHERE username='$username' and password='$password'";
$result=pg_query($sql);

$count=pg_num_rows($result);
if($count==1){



$_SESSION['valid_user'] = $username;

echo "success";

}
else {


	
$_SESSION['invalid_user'] = $username;
//header("location:index.php");
echo "failed";

}
?>