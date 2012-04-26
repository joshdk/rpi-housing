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
				<div id='acs-cont' align='center' valign='center'>
					Student RCSID: <input type='text' name='student' id='student'>
								 <input type='submit' value='Lookup' id='acs-submit'>
				</div>	";
	
	}
	
?>
		 
<script>
 $("#acs-submit").click(function(event){
    $.post("pages/popup_adminCheckStatus.php", { username: $('#student').val() },
	   function(data) {
			$( "#acs-cont" ).html( data );
	   });    
  });
  
 $("#remove").click(function(event){
    $.post("pages/popup_adminCheckStatus.php", { remove: true },
	   function(data) {
			$( "#acs-cont" ).html( data );
	   });    
  });



</script>