<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/config.php');
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/database.php');
	
	session_start();
	
	$db = new database();
	
	//Connect to Database
	if( $db->connect($ROLES["remote"]) ){
		$query = "	SELECT r.room_id, b.name, r.number, r.totalpeople, r.squarefeet
				FROM rooms r INNER JOIN buildings b ON r.building_id = b.building_id
				";
				
		$db->query($query);		
	}
	else
		echo 'Warning: Your are not connected to the RPI network!';
										
?>
	
<style type="text/css" title="currentStyle">
	@import "data/CSS/demo_page.css";
	@import "data/CSS/demo_table.css";
</style>
		

<div id="post2">
	<h3>Search Rooms</h3>
	
		<div id="search_results">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">	
				<thead>
					<tr>
						<th>Building Name</th>
						<th>Number</th>
						<th>Occupents</th>
						<th>Capacity</th>
						<?php if( isset($_SESSION['admin']) && $_SESSION['admin'] ){ ?>
						<th>Register</th>
						<?php } ?>
					</tr>
				</thead>	
				<tbody>
				
				<?php while( $row = $db->fetch_row_assoc() ){ ?>				
					<tr>
						<td><?php echo $row['name']?></td>
						<td><?php echo $row['number']?></td>
						<td>0</td>
						<td><?php echo $row['totalpeople']?></td>
						<?php if( isset($_SESSION['admin']) && $_SESSION['admin'] ){ ?>
						<td>							
							<input class="add" type="submit" name="<?php echo $row['room_id']?>" value="Add Room" />						
						</td>
						<?php } ?>
					</tr>	
					
				<?php } ?>
				</tbody>	
			</table>
		</div>	
	
	
</div>
<div id="dialog-message"></div>
<br class="clearfix" />
<script type="text/javascript" src="data/javascript/search.js"></script>
<script type="text/javascript" language="javascript" src="data/javascript/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	//Datatable Plugin	
	$('#example').dataTable( {
		"sPaginationType":"full_numbers",
         "aaSorting":[[1, "desc"]]		 
	} );
	
	 $(document).ready(function(){
            $('.add').click(function(){
				var id = $(this).attr("name");
				alert(id); 
				$.post("search.php", { id: id } );
            });
        });
			
</script>
