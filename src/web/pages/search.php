
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
			<option value="Warren">Warren Hall</option>
		</select>
		</li>
	
		<li><h4>Spaces Remaining</h4></li>
		<li class="advItem">
		<font class="min">Room Slots Remaining: </font><input name="min" type="text" class="slots" id="slot_min" value="0" />
		<font class="max">Room Size:</font> <input name="min" type="text" class="slots" id="slot_max" value="6" />	
		</li>
	
		<li><input id="advanced-search" name="Submit" type="submit" value="Submit" /></li>
	</ul>

</div>
<div id="post2">
	<h3>Search Results</h3>
	<div id="search_results">
	
	
	
	</div>
	
	<?php
	session_start();
	if( $_SESSION['auth'] == true ){
		echo '<input id="add-to-queue" name="add-to-queue" type="submit" value="Add Selected to Queue" />';
	}
	?>
	
</div>
<script type="text/javascript" src="data/javascript/search.js"></script>
<br class="clearfix" />
