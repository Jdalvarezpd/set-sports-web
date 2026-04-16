<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$host="localhost";
$user="set_admin";
$pass="Sets302019";
$database="soccer_manager";

	$db = new mysqli($host,$user,$pass,$database);
	if($db -> connect_errno){
		die("Fallo la conexion a Mysql: (". $db -> mysql_connect_errno()
		.")" . $db -> mysql_connect_errno());
	}
	mysqli_set_charset($db, 'utf8');

 ?>