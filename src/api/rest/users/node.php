<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/api/rest/users/crud.php');



function rest_prepare() {
	$params=null;
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method == "PUT" || $method == "DELETE") {
		parse_str(file_get_contents('php://input'), $params);
		$GLOBALS["_{$method}"] = $params;
		// Add these request vars into _REQUEST, mimicing default behavior, PUT/DELETE will override existing COOKIE/GET vars
		$_REQUEST = $params + $_REQUEST;
	} else if ($method == "GET") {
		$params = $_GET;
	} else if ($method == "POST") {
		$params = $_POST;
	}
	return $params;
}




function get($params){
	include($_SERVER['DOCUMENT_ROOT'].'/api/core/config.php');
	$json=array('errors'=>false,'errmsg'=>'none','data'=>null);

	$db=new database();
	if($db->connect($ROLES['remote'])){
		if(isset($params['building']) && isset($params['room']) && isset($params['user'])){
			$json['data']=read($db,array('building'=>$params['building'],'room'=>$params['room'],'user'=>$params['user']));
		}else{
			$json['data']=read($db,array('building'=>$params['building'],'room'=>$params['room']));
		}
		if(count($json['data']) < 1){
			$json['errors']=true;
			$json['errmsg']="No such user";
		}
	}else{
		$json['errors']=true;
		$json['errmsg']="Could not connect to database";
	}
	return $json;

}






$params=rest_prepare();
//echo '<pre>';
//print_r($params);
//print_r($_SERVER);
//echo '</pre>';
switch($_SERVER['REQUEST_METHOD']){
	case 'GET':
		//echo 'GET';
		$json=null;
		$json=get($params);
		echo json_encode($json);
		break;
	case 'POST':
		echo 'POST';
		break;
	case 'PUT':
		echo 'PUT';
		break;
	case 'DELETE':
		echo 'DELETE';
		break;
	default:
		echo 'UNKNOWN...';
}





?>
