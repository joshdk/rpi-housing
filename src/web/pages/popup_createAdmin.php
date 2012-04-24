<?php
	include_once( '../data/PHP/admin.php' );
	
	if( isset( $_POST['username'] ) ){	
		Admin::addAdmin( $_POST['username'], '', '', $_POST['username'].'@rpi.edu'  );		
	}
	
?>
<div id='cont'>
	Admin RCSID: <input type='text' name='admin' id='admin'>
				 <input type='submit' value='Add' id='submit'>
</div>			 
<script>

 $("#submit").click(function(event){
    $.post("pages/popup_createAdmin.php", { username: $('#admin').val() },
	   function(data) {
			$( "#cont" ).empty().append( data );
	   });    
  });


</script>