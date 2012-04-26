<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/web/data/PHP/admin.php' );
	include_once($_SERVER['DOCUMENT_ROOT'] . '/web/data/PHP/users.php' );
	
	session_start();
	
	
	if( isset( $_POST['username'] ) ){	
		Admin::checkRoomStatus( $_POST['username'] );
		//echo 'l';
		$_SESSION['temp'] = $_POST['username'];
	}
	else if( isset( $_POST['remove'] ) ){
		Admin::removeFromRoom( $_SESSION['temp'] );
		unset( $_SESSION['temp'] );
	}
	else {
	
		echo "
				<div id='cont'>
					Student RCSID: <input type='text' name='student' id='student'>
								 <input type='submit' value='Lookup' id='submit'>
				</div>	";
	
	}
	
?>
		 
<script>
 $("#submit").click(function(event){
    $.post("pages/popup_adminCheckStatus.php", { username: $('#student').val() },
	   function(data) {
			$( "#cont" ).html( data );
	   });    
  });
  
 $("#remove").click(function(event){
    $.post("pages/popup_adminCheckStatus.php", { remove: true },
	   function(data) {
			$( "#cont" ).html( data );
	   });    
  });



</script>