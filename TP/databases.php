<?php 
error_reporting(E_ALL);
$uploads_dir = './uploads';
//print '<pre>';
//print_r($_REQUEST);
$conn = new PDO('mysql:host=localhost;dbname=licda', 'root', 'root');
if (isset($_REQUEST['action'])) {
	switch ($_REQUEST['action']) {
		case 'del':
		$sql = 'delete from etudiants where id = '.$_REQUEST['id'];
		$conn->query($sql);
		break;
		case 'ajouter':
		case 'Enregistrer':
		if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["image"]["tmp_name"];
			$name = $_FILES["image"]["name"];
			move_uploaded_file($tmp_name, "$uploads_dir/$name");
		}
		$sql = 'delete from etudiants where id = '.$_REQUEST['id'];
		$conn->query($sql);
		
		$insert = $conn->prepare('INSERT INTO etudiants (id,nom,prenom,age,image) VALUES (:id,:nom,:prenom,:age,:image)');
		$insert->execute(array(
			':nom' => $_POST['nom'],
			':prenom' => $_POST['prenom'],
			':age' => $_POST['age'],
			':id' => $_POST['id'],
			':image' => $name,
			));
		break;
		// case 'Enregistrer':
		// $insert = $conn->prepare('update etudiants set nom=:nom,prenom=:prenom,age=:age where id =:id');
		// $insert->execute(array(
		// 	':nom' => $_POST['nom'],
		// 	':prenom' => $_POST['prenom'],
		// 	':age' => $_POST['age'],
		// 	':id' => $_POST['id']
		// 	));
		// break;
		default:break;
	}
}
$sql = 'select * from etudiants';
$res = $conn->query($sql,PDO::FETCH_ASSOC);//FETCH_OBJ
$etudiants = $res->fetchAll();
?>
<a href="databases.php?action=add" title="Ajouter">Créer un nouvel étudiant</a>

<?php if (isset($_GET['action']) && ( $_GET['action']=='add' || $_GET['action']=='modifier')):?>
	<?php 
	$nom = '';
	$prenom = '';
	$age = '';
	$id = null;
	if($_GET['action']=='modifier'){
		$sql = 'select * from etudiants where id ='.$_GET['id'];
		$res = $conn->query($sql,PDO::FETCH_OBJ);
		$editEtudiant = $res->fetch();
		$nom = $editEtudiant->nom;
		$prenom = $editEtudiant->prenom;
		$age = $editEtudiant->age;
		$id=$editEtudiant->id;
	}
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="text" name="nom" value="<?php print $nom ?>" placeholder="Nom">
		<input type="text" name="prenom" value="<?php print $prenom ?>" placeholder="Prénom">
		<input type="text" name="age" value="<?php print $age ?>" placeholder="Age">
		<input type="file" name="image">
		<input type="hidden" name="id" value="<?php print $id ?>" placeholder="Age">
		<input type="submit" name="action" value="<?php print ($_GET['action']=='add')?'ajouter':'Enregistrer' ?>">
	</form>
<?php endif; ?>

<!-- <?php if (isset($_GET['action']) && $_GET['action']=='modifier'):?>
	<?php 
	$sql = 'select * from etudiants where id ='.$_GET['id'];
	$res = $conn->query($sql,PDO::FETCH_OBJ);
	$editEtudiant = $res->fetch();
	?>
	<h2>Modifier l'étudiant : <?php print $_REQUEST['id']?></h2>
	<form action="" method="post">
		<input type="text" name="nom" value="<?php print $editEtudiant->nom ?>" placeholder="Nom">
		<input type="text" name="prenom" value="<?php print $editEtudiant->prenom ?>" placeholder="Prénom">
		<input type="text" name="age" value="<?php print $editEtudiant->age ?>" placeholder="Age">
		<input type="hidden" name="id" value="<?php print $editEtudiant->id ?>">
		<input type="submit" name="action" value="Enregistrer">
	</form>
<?php endif; ?> -->


<table border="1" cellpadding="0" cellspacing="0" width="300px" align="center">
	<thead>
		<tr>
			<th align="center">Id</th>
			<th align="center">image</th>
			<th align="center">Nom</th>
			<th align="center">Prénom</th>
			<th align="center">Age</th>
			<th align="center">Supprimer</th>
			<th align="center">Modifier</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($etudiants as $etudiant): ?>
			<tr>
				<td><?php print $etudiant['id'] ?></td>
				<td><img src="<?php print $uploads_dir ?>/<?php print $etudiant['image'] ?>" alt="" width="50"></td>
				<td><?php print $etudiant['nom'] ?></td>
				<td><?php print $etudiant['prenom'] ?></td>
				<td><?php print $etudiant['age'] ?></td>
				<td><a class="confirm" href="databases.php?id=<?php print $etudiant['id'] ?>&action=del" title="Supprimer">Supprimer</a></td>
				<td><a class="confirm" href="databases.php?id=<?php print $etudiant['id'] ?>&action=modifier" title="Supprimer">Modifier</a></td>

			</tr>
		<?php endforeach ?>

	</tbody>
</table>

<script type="text/javascript">
	//confirm('Voulez-vous supprimer ce champs ?');
</script>