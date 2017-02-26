<?php 
error_reporting(E_ALL);
//print '<pre>';
//print_r($_REQUEST);
$conn = new PDO('mysql:host=localhost;dbname=licda', 'root', 'root');
if (isset($_REQUEST['action'])) {
	switch ($_REQUEST['action']) {
		case 'del':
		$sql = 'delete from etudiants where id = '.$_REQUEST['id'];
		$conn->query($sql);
			//header("location:databases.php");
		break;
		case 'ajouter':
		$insert = $conn->prepare('INSERT INTO etudiants (nom,prenom,age) VALUES (:nom,:prenom,:age)');
		$insert->execute(array(
			':nom' => $_POST['nom'],
			':prenom' => $_POST['prenom'],
			':age' => $_POST['age'],
			));
		break;
		default:break;
	}
}
$sql = 'select * from etudiants';
$res = $conn->query($sql,PDO::FETCH_ASSOC);//FETCH_OBJ
$etudiants = $res->fetchAll();
?>
<a href="databases.php?action=add" title="Ajouter">Créer un nouvel étudiant</a>
<?php if (isset($_GET['action']) && $_GET['action']=='add'):?>
	<form action="" method="post">
		<input type="text" name="nom" value="" placeholder="Nom">
		<input type="text" name="prenom" value="" placeholder="Prénom">
		<input type="text" name="age" value="" placeholder="Age">
		<input type="submit" name="action" value="ajouter">
	</form>
<?php endif; ?>
<table border="1" cellpadding="0" cellspacing="0" width="300px" align="center">
	<thead>
		<tr>
			<th align="center">Id</th>
			<th align="center">Nom</th>
			<th align="center">Prénom</th>
			<th align="center">Age</th>
			<th align="center">Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($etudiants as $etudiant): ?>
			<tr>
				<td><?php print $etudiant['id'] ?></td>
				<td><?php print $etudiant['nom'] ?></td>
				<td><?php print $etudiant['prenom'] ?></td>
				<td><?php print $etudiant['age'] ?></td>
				<td><a class="confirm" href="databases.php?id=<?php print $etudiant['id'] ?>&action=del" title="Supprimer">Supprimer</a></td>

			</tr>
		<?php endforeach ?>

	</tbody>
</table>

<script type="text/javascript">
	//confirm('Voulez-vous supprimer ce champs ?');
</script>