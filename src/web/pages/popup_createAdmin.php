<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/web/data/PHP/admin.php' );
	
	if( isset( $_POST['username'] ) ){	
		Admin::addAdmin( $_POST['username'], '', '', $_POST['username'].'@rpi.edu'  );		
	}
	
?>
<div id='cdamin' align='center' valign='center'>
	Admin RCSID: <input type='text' name='admin' id='admin'>
				 <input type='submit' value='Add' id='cadmin-submit'>
</div>			 
<script>

 $("#cadmin-submit").click(function(event){
    $.post("pages/popup_createAdmin.php", { username: $('#admin').val() },
	   function(data) {
			$( "#cdamin" ).empty().append( data );
	   });    
  });


</script>