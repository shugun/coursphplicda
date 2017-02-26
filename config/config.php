<?php
error_reporting(E_ALL);
//session_start();
define('T_ETUDIANTS','etudiants');
define('MYSQL_HOST','localhost');
define('MYSQL_DB','licda');
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','root');
$uploads_dir = './uploads';
global $conn;
function connexionBaseDeDonne(){
	global $conn;
	//$conn = new PDO('mysql:host=localhost;dbname=licda', 'root', 'root');
	$conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
	//return $conn;retrieve_password():
}
function supprimer($table,$id){
	global $conn;
	$sql = "delete from $table where id =$id";
	$conn->query($sql);
}
function supprimerAll($table,$id){
	global $conn;
	$sql = "delete from $table where id in($id)";
	$conn->query($sql);
}
function pre($tableau){
	print '<pre>';
 	print_r($tableau);
 	print '</pre>';
 	die('terminé');
}