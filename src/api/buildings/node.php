<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/api/buildings/buildings.php');



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
		if(isset($params['id'])){
			$json['data']=read($db,array('id'=>$params['id']));
		}else{
			$json['data']=read($db,array());
		}
	}else{
		$json['errors']=true;
		$json['errmsg']="Could not connect to database";
	}
	return $json;

}






$params=rest_prepare();
$json=null;
//echo '<pre>';
//print_r($params);
//echo '</pre>';
switch($_SERVER['REQUEST_METHOD']){
	case 'GET':
		//echo 'GET';
		$json=get($params);
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

echo json_encode($json);




?>
