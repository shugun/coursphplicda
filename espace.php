<?php 
include('config/config.php');
if(isset($_SERVER['HTTP_REFERER'])){
	$hostREf = $_SERVER['HTTP_REFERER'];
	$monURL = parse_url($hostREf);
	// print '<pre>';
	// print getcwd();
	// print '</pre>';
	// pre($_SERVER['DOCUMENT_ROOT']);

	// pre($monURL);
	// die;
}
if(isset($_GET['action']) && $_GET['action']=='logout'){
	unset($_SESSION['user']);
}
if(!isset($_SESSION['user']['login'])){
	header('location:login.php');
}
print 'Bonjour '.$_SESSION['user']['login'];


?>
<a href="espace.php?action=logout" title="">se deconnecter</a>