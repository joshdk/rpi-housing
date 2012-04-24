<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/database.php');
	
	$room_id = $_POST['room_id'];

	$db = new database();
	require($_SERVER['DOCUMENT_ROOT'] . '.../api/core/config.php');

	if( $db->connect($ROLES["remote"]) )
		echo '';
	else
		echo 'Error Cannot Connect to Database';
	
	
	$query = "	SELECT b.name, r.number
				FROM rooms r JOIN buildings b ON r.building_id = b.building_id
				WHERE r.room_id='".$room_id."'
		";
		
	$db->query($query);
	$row = $db->fetch_row_assoc();
	echo ''.$row['name'].' '.$row['number'];
	echo '<br /><label>Student RCSID: </label><input type="text" >';
	echo '<br /><input type="submit" value="Register" >';

?>

