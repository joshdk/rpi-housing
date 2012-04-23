<?php
include($_SERVER['DOCUMENT_ROOT'].'/api/core/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/api/core/database.php');


	//function create($db,$data){
		//if(!$db->prepare("INSERT INTO buildings(name, location, description) VALUES(?, ?, ?);")){
			//return false;
		//}
		//if(!$db->execute(array($data['name'],$data['location'],$data['description']))){
			//return false;
		//}
		//return true;
	//}


	function read($db,$data){
		if(isset($data['room'])){//exact id
			if(!$db->prepare("SELECT * FROM rooms WHERE building_id=? AND id=?;")){
				return false;
			}
			if(!$db->execute(array($data['building'],$data['room']))){
				return false;
			}
			return $db->fetch_rows_assoc();

		}else{//all rooms
			if(!$db->prepare("SELECT * FROM rooms WHERE building_id=?;")){
				return false;
			}
			if(!$db->execute(array($data['building']))){
				return false;
			}
			return $db->fetch_rows_assoc();

		}
		return false;
	}


	//function delete($db,$data){
		//if(!$db->prepare("DELETE FROM buildings WHERE building_id=?;")){
			//return false;
		//}
		//if(!$db->execute(array($data['id']))){
			//return false;
		//}
		//return true;
	//}


?>
