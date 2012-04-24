
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/api/core/database.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/api/core/cas.php');

class Users {

	public static function logout ( $casfn ){
		$_SESSION['auth'] = false;
		$_SESSION['user'] = null;
		$_SESSION['admin'] = false;
		$casfn->logout();

	}

	public static function login ( $casfn ){
		$casfn->login();
	}

	public static function verfiyUser( $casfn ){

		$auth = $casfn->is_authenticated();

		//Session Variables
		if( $auth ){
			$_SESSION['auth'] = true;
			$_SESSION['user'] = $casfn->get_user();
			if( self::checkAdmin( $_SESSION['user']) )
				$_SESSION['admin'] = true;
			else
				$_SESSION['admin'] = false;
		}
		else{
			$_SESSION['auth'] = false;
			$_SESSION['user'] = null;
			$_SESSION['admin'] = false;

		}
	}

	public static function checkRoomStatus( $user ){

		$db = self::connect();

		//Check if User is in Lottery
		$db->query("
			SELECT b.name, r.number
			FROM users u JOIN rooms r ON u.room_id = r.room_id JOIN buildings b ON b.building_id = r.building_id
			WHERE u.rcsid = '".$user."'
			");
		return $db->fetch_row_assoc();
	}

	//------------------------------------------
	//------------------------------------------
	//------------------------------------------

	private function connect(){
		$db = new database();
		require($_SERVER['DOCUMENT_ROOT'] . '.../api/core/config.php');

		if( $db->connect($ROLES["remote"]) )
			echo '';
		else
			echo 'Error Cannot Connect to Database';

		return $db;
	}

	//Checks if user is an admin
	//Usage: checkAdmin( $admin )
	private function checkAdmin( $username ) {

		$db = self::connect();

		$query = "	SELECT *
			FROM admins
			WHERE username='".$username."'
			";

		$db->query($query);

		if ( $db->fetch_row_assoc() )
			return true;
		else
			return false;
	}

}

?>
