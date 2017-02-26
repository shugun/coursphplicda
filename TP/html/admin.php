<?php 
include('config/config.php');
connexionBaseDeDonne();
if (isset($_REQUEST['ajouterRef']) && !empty($_REQUEST['ajouterRef'])) {
	// Ajout d'une référence

	$sql = "insert into refs values(NULL,'".$_REQUEST['titre']."','".$_REQUEST['ss_titre']."','".$_REQUEST['cat']."','".$_REQUEST['visuel']."')";
	$conn->query($sql);
}
?>
<form action="" method="post" enctype="multipart/form-data">
	<p>
		<p><label>Titre : </label><input type="text" name="titre" value=""></p>
		<p><label>Sous Titre : </label><input type="text" name="ss_titre" value=""></p>
		<p><label>Catégorie : </label><input type="text" name="cat" value=""></p>
		<p><label>Titre : </label><input type="file" name="visuel"></p>
		<p>
			<input type="submit" name="ajouterRef" value="Ajouter une référence">
		</p>
	</p>
</form>