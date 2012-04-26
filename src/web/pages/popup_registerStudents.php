<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/web/data/PHP/admin.php' );
	
	
	if( isset( $_POST['room_id'] ) ){
		$room_id = $_POST['room_id'];
		echo '<div id="rs-cont" align="center" valign="center">';
		Admin::roomInfo( $room_id );
		echo '<br /><label>Student RCSID: </label><input id="the_user" type="text" >';
		echo '<br /><span id="rs-error"></span>';
		echo '<br /><input type="submit" id="reg_user" value="Register" >';
		echo '</div>';
		echo '<script>
					$("#reg_user").click(function(event){
						$.post("pages/popup_registerStudents.php", { reg_user: $("#the_user").val(), room: '.$room_id.'  },
						   function(data) {
								$( "#rs-error" ).empty().append( data );
						   });    
					  });
			  </script>';
			  
	} else if( isset( $_POST['reg_user'] ) ){
	
		$return = Admin::registerUser( $_POST['reg_user'], $_POST['room'] );
		
		if( !$return )
			echo 'User has been registered!
				<script>					
					$("#content").load( "pages/search.php")					
				</script>		
				';
		else
			echo $return;
	
	}
?>

