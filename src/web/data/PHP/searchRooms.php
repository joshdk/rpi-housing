<?php

	
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/config.php');
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/database.php');
	
	if( isset($_POST['building'] )){
		$building = $_POST['building'];
		echo 'yup';
	}
	if( isset($_POST['totalpeople'] )){
		$totalpeople = $_POST['totalpeople'];
		echo 'si';
	}
	
	
	session_start();
	
	$db = new database();
	
	//Connect to Database
	if( $db->connect($ROLES["remote"]) )
		echo '';
	else
		echo 'Error Cannot Connect to Database';
		
	
	
	//Query
	if( $building == "all" )
		$query = "	SELECT b.name, r.number, r.totalpeople, r.squarefeet
					FROM rooms r INNER JOIN buildings b ON r.building_id = b.building_id
					WHERE r.totalpeople <= $totalpeople
					";
					
	else
		$query = "	SELECT b.name, r.number, r.totalpeople, r.squarefeet
					FROM rooms r INNER JOIN buildings b ON r.building_id = b.building_id
					WHERE r.totalpeople <= $totalpeople AND b.name = '$building'
					";
				
				  
	if($db->query($query)){
		
		echo "  <thead>
					<tr>
						<th>Building Name</th>
						<th>Room Number</th>
						<th>Room Capacity</th>
						<th>Room Size (sqft)</th>
					</tr>
	
				</thead>
				<tbody>
			";
			
			
		while( $row = $db->fetch_row_assoc() ){
			echo "
			<tr>
				<td>".$row['name']."</td>
				<td>".$row['number']."</td>
				<td>".$row['totalpeople']."</td>
				<td>".$row['squarefeet']."</td>
			</tr>
			";
		}
		echo '</tbody>';
		
		
	}
	else
		echo "SHIT";
		
?>

