<?php	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/config.php');	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/database.php');		session_start();		$db = new database();		//Connect to Database	if( $db->connect($ROLES["remote"]) )		echo '';	else		echo 'Error Cannot Connect to Database';			//Login	if (isset($_POST['register'])) {		$db->query("					INSERT INTO users (username, email)					VALUES ('".$_SESSION['user']."', '".$_SESSION['user']."@rpi.edu')					");		echo 'You Have Been Registered!';	}		if (isset($_POST['unregister'])) {		$db->query("					DELETE FROM users					WHERE username = '".$_SESSION['user']."'						");		echo 'You Have Been Unegistered!';	}?>