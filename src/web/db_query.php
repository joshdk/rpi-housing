<?php

		
$min = $_POST['slot_min'] ;
$max = $_POST['slot_max'] ;

// This would be a good time to sanatize the inputs
//
//
//

############## Make the postgreSQL connection ###########

$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=test") or  die('Could not connect !<br />Please contact the site\'s administrator.');

#### Building is All ####

if ( $_POST['building'] == "all" ){

	$query = pg_query(" SELECT * FROM buildings WHERE rooms_left>=$min AND rooms_left<=$max ");
	echo '<table class="solution">';
	
	echo '
	<tr>
			<th>Add2Queue</th>
			<th>Building</th>
			<th>Slots Left</th>
			<th>Room Number</th>
	</tr>';
	$i = 0;
	while ($data = pg_fetch_array($query)) {
		$i++;
		echo '
		
		<tr>
			<td> <input type="checkbox" class="marked" value="'.$data["room"].'" /></td>
			<td>'.$data["name"].'</td>
			<td>'.$data["rooms_left"].'</td>
			<td>'.$data["room"].'</td>
			
		</tr>';

	}
	echo '</table>';
	
	
}
else {

	$query = pg_query(" SELECT * FROM buildings WHERE name='".$_POST['building']."' AND rooms_left>=$min AND rooms_left<=$max ");
	echo '<table class="solution">';

	echo '
	<tr>
			<th>Building</th>
			<th>Slots Left</th>
			<th>Room Number</th>
	</tr>';
	
	while ($data = pg_fetch_array($query)) {

		echo '
		
		<tr>
			<td style="font-size:18px;">'.$data["name"].'</td>
			<td style="font-size:18px;">'.$data["rooms_left"].'</td>
			<td style="font-size:18px;">'.$data["room"].'</td>
			
		</tr>';

	}
	echo '</table>';
}

?>