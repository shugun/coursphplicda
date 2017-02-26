<?php 
include('config/config.php');
if(isset($_POST['connect']) && $_POST['login']!=''){
	connexionBaseDeDonne();
	$login = $_POST['login'];
	$password = md5($_POST['password']);
	$login = addslashes($login);
	
	// print $_POST['password'] .' == '. $password.'<br>';
	// print $_POST['password'] .' === '. $password.'<br>';
	// var_dump($password);
	// var_dump($_POST['password']);
	
	$sql ='select * from utilistateurs where login like \''.$login.'\' and password =\''.$password.'\'';
	echo $sql;die;
 	$res = $conn->query($sql,PDO::FETCH_ASSOC);//FETCH_OBJ
 	$user = $res->fetch();
 	//var_dump($user);
 	if($user==false){
 		print 'Mauvais mot de passe';
 	}else{
 		//$_COOKIE['user'] = $user['login'];
 		$_SESSION['user'] = $user;
 		header('location:espace.php');
 	}
 	//pre($user);
 }
 ?>
 <form action="" method="post">
 	<input type="text" name="login">
 	<input type="password" name="password">
 	<input type="submit" name="connect" value="Se connecter">
 </form>