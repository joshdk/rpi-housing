<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/config.php');
	include_once($_SERVER['DOCUMENT_ROOT'] . '.../api/core/database.php');
	
	session_start();
	
	$db = new database();
	
	//Connect to Database
	if( $db->connect($ROLES["remote"]) )
		echo '';
	else
		echo 'Error Cannot Connect to Database';
			
	$query = "	SELECT b.name, r.number, r.totalpeople, r.squarefeet
				FROM rooms r INNER JOIN buildings b ON r.building_id = b.building_id
				";
				
	$db->query($query);
					
					
?>
	
<style type="text/css" title="currentStyle">
	@import "data/CSS/demo_page.css";
	@import "data/CSS/demo_table.css";
</style>
		
		
<!-- THIS IS THE OLD WAY 		
<div id="post1">
	<h2>advanced search</h2>
	
	<p>
	
	<ul>
		<li><h4>Building</h4></li>
		<li class="advItem">
		Name: 
		<select id="building" name="building" class="dropdown">
			<option value="all">All</option>
			<option value="blitman">Blitman Residence Commons</option>
			<option value="barh">Burdett Avenue Residence Hall</option>
			<option value="colonie">Colonie Apartments</option>
			<option value="davison">Davison Hall</option>
			<option value="ecomplex">E-Complex</option>
			<option value="north">North Hall</option>
			<option value="nugent">Nugent Hall</option>
			<option value="polytech">Polytechnic Residence Commons</option>
			<option value="quad">Quadrangle (The Quad)</option>
			<option value="sharp">Sharp Hall</option>
			<option value="rahp">Single RAHP</option>
			<option value="stacwyck">Stacwyck Apartments</option>
			<option value="warren">Warren Hall</option>
		</select>
		</li>
	
		<li><h4>Spaces Remaining</h4></li>
		<li class="advItem">
		<font class="max">Max Occupents:</font> <input name="min" type="text" class="slots" id="totalpeople" value="6" />	
		</li>
	
		<li><input id="advanced-search" name="Submit" type="submit" value="Submit" /></li>
	</ul>

</div>
-->

<div id="post2">
	<h3>Search Rooms</h3>
	
		<div id="search_results">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">	
				<thead>
					<tr>
						<th>Building Name</th>
						<th>Number</th>
						<th>Capacity</th>
						<th>Size (sqft)</th>
						<th>Add Room to Queue</th>
					</tr>
				</thead>	
				<tbody>
				
				<?php
					//Populates the rows
					while( $row = $db->fetch_row_assoc() ){
				?>
				
					<tr>
						<td><?php echo $row['name']?></td>
						<td><?php echo $row['number']?></td>
						<td><?php echo $row['totalpeople']?></td>
						<td><?php echo $row['squarefeet']?></td>
						<td><?php echo "<a href='#'> Add to Queue </a>" ?></td>
					</tr>	
					
				<?php
					}
				?>
				</tbody>	
			</table>
		</div>	
	
	
</div>
<br class="clearfix" />
<script type="text/javascript" src="data/javascript/search.js"></script>
<script type="text/javascript" language="javascript" src="data/javascript/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	//Top Advanced Search Button
	$('#advanced-search').click( function() {
		
		$.post( 'data/PHP/searchRooms.php', { building: $("#building").val(), totalpeople: $("#totalpeople").val() },
		  function( results ) {
			  
			  $( "#search_results" ).empty().append( results );
		  }
		);
		
		return false;
	  
	});
	
	//Datatable Plugin	
	$('#example').dataTable( {
		"sPaginationType":"full_numbers",
         "aaSorting":[[1, "desc"]]
		 
                    

	} );
		
</script>
