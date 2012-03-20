<?php


//Array of database connection information
$ROLES=array(
	//localhost server
	"local"=>array(
		"host"=>"localhost",
		"port"=>"5432",
		"user"=>"admin",
		"pass"=>"admin",
		"name"=>"rpihousing",
	),

	//Lally server
	"remote"=>array(
		"host"=>"128.213.49.46",
		"port"=>"5432",
		"user"=>"postgres",
		"pass"=>"nonlinear",
		"name"=>"rpihousing",
	),

);


//Array of CAS authentication server information
$CAS=array(
	"host"=>"cas-auth.rpi.edu",
	"port"=>443,
	"context"=>"/cas",
);


?>
