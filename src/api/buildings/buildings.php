<?php

	include($_SERVER['DOCUMENT_ROOT'].'/api/core/database.php');
	include($_SERVER['DOCUMENT_ROOT'].'/api/core/config.php');


	//echo '<pre>';
	//print_r($_SERVER);
	//echo '-------------------------';
	//print_r($_REQUEST);
	//echo '-------------------------';
	//echo '</pre>';


	//function create($db,$data){
		//$sql="INSERT INTO buildings (name,location,description) VALUES ('".$data['name']."','".$data['location']."','".$data['description']."')";

		//$db->query($sql);
	//}


	//$db=new database();
	//if($db->connect($ROLES['remote'])){
		////echo 'success!';
		////$db->prepare("SELECT * FROM buildings LIMIT ?");
		////$db->execute(array(100));

		//delete($db,array('id'=>18));
		//print_r(read($db,array()));
	//}else{
		//echo 'new() failed...';
	//}


	//$db->prepare('test','SELECT * FROM buildings');
	//$db->execute('test',array());
	//echo '<pre>';
	//print_r($db->fetch_rows_assoc());
	//echo '</pre>';


	//create($db,array('name'=>$_GET['name'],'location'=>$_GET['location'],'description'=>$_GET['desc']));

	function create($db,$data){
		if(!$db->prepare("INSERT INTO buildings(name, location, description) VALUES(?, ?, ?);")){
			return false;
		}
		if(!$db->execute(array($data['name'],$data['location'],$data['description']))){
			return false;
		}
		return true;
	}



	function read($db,$data){
		if(isset($data['id'])){//exact id
			if(!$db->prepare("SELECT * FROM buildings WHERE building_id=?;")){
				return false;
			}
			if(!$db->execute(array($data['id']))){
				return false;
			}
			return $db->fetch_rows_assoc();

		}else{//all ids
			if(!$db->prepare("SELECT * FROM buildings;")){
				return false;
			}
			if(!$db->execute(array())){
				return false;
			}
			return $db->fetch_rows_assoc();

		}
		return false;
	}


	function delete($db,$data){
		if(!$db->prepare("DELETE FROM buildings WHERE building_id=?;")){
			return false;
		}
		if(!$db->execute(array($data['id']))){
			return false;
		}
		return true;
	}



?>
