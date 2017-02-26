
	<form action="" method="post" enctype="multipart/form-data">
		<input type="text" name="nom" value="<?php print $nom ?>" placeholder="Nom">
		<input type="text" name="prenom" value="<?php print $prenom ?>" placeholder="Prénom">
		<input type="text" name="age" value="<?php print $age ?>" placeholder="Age">
		<input type="file" name="cni">
		<input type="file" name="image">
		<input type="hidden" name="id" value="<?php print $id ?>" placeholder="Age">
		<br>
		<input type="submit" name="action" value="<?php print ($_GET['action']=='add')?'ajouter':'Enregistrer' ?>">

	</form>
	<br>
	<br>
	<br>