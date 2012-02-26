<?php
include("CAS.php");


//Central Authentication Service wrapper
class casauth{
	
	//Class constructor
	//ex. $cas = new casauth();
	public function __construct(){
	}


	//Connect to CAS server
	//ex. $cas->connect($CAS);
	public function connect($info){
		phpCAS::client(CAS_VERSION_2_0,$info["host"],$info["port"],$info["context"]);
		phpCAS::setNoCasServerValidation();
	}


	//Force CAS login
	//ex. $cas->login();
	public function login(){
		return phpCAS::forceAuthentication();
	}


	//Force CAS logout
	//ex. $cas->logout();
	public function logout(){
		return phpCAS::logout();
	}


	//Check if user is authenticated
	//ex. $cas->is_authenticated();
	public function is_authenticated(){
		return phpCAS::checkAuthentication();
	}


	//Get an authenticated user's name
	//ex. $cas->get_user();
	public function get_user(){
		return phpCAS::getUser();
	}

}


?>
