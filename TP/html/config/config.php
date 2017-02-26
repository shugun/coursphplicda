<?php
error_reporting(E_ALL);
//session_start();
define('T_ETUDIANTS','etudiants');
$uploads_dir = './uploads';
global $conn;
function connexionBaseDeDonne(){
	global $conn;
	$conn = new PDO('mysql:host=localhost;dbname=greenolive', 'root', 'root');
	//return $conn;retrieve_password():
}
function getFromTable($table){
	connexionBaseDeDonne();
	global $conn;
	$sql = 'select * from '.$table;	
	$res = $conn->query($sql,PDO::FETCH_ASSOC);
	return $res->fetchAll();
}

function getDistinctFromTable($table,$champ){
	connexionBaseDeDonne();
	global $conn;
	$sql = 'select distinct('.$champ.') from '.$table;
	$res = $conn->query($sql,PDO::FETCH_ASSOC);
	return $res->fetchAll();
}

function supprimer($table,$id){
	global $conn;
	$sql = "delete from $table where id =$id";
	$conn->query($sql);
}
function pre($tableau){
	print '<pre>';
 	print_r($tableau);
 	print '</pre>';
 	die('terminé');
}