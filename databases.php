<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div id="main-content">
		<?php 
		include('config/config.php');
		connexionBaseDeDonne();
		if (isset($_REQUEST['action'])) {
			$name = '';
			$cni = '';
			switch ($_REQUEST['action']) {
				case 'senMail':
				$mailContent = file_get_contents('newsl/renault.html');
				$mailContent = str_replace('{{!nom}}','Flan',$mailContent);
				$mailContent = str_replace('{{!contenu}}','Docteur contact est le premier site au maroc dédié aux médecins et dentistes privés.
					Vous cherchez et vous localisez facilement vos médecins, sur notre site.
					Effectuez des recherches approchées facilement, et bonne visite',$mailContent);

				require 'config/phpmailer/class.phpmailer.php';
				$monMail = new phpmailer();
				$monMail->AddAddress('hichamhamdan@gmail.com');
				$monMail->From = 'directeur@fst-settat.com';
				$monMail->FromName = 'Le directeur';
				$monMail->Subject = 'Bonjour';
				$monMail->Body = $mailContent;
				$monMail->ContentType = 'text/html';
				$res = $monMail->Send();
					// $headers = "From: hichamhamdan@gmail.com \r\n" ; 
					// $headers .= "Reply-To: hichamhamdan@gmail.com \r\n";
					// $headers.= " Content-type: text/html; charset=iso-8859-1 \r\n";
					// mail('hichamhamdan@gmail.com','Exemple NewsLetter',$mailContent,$headers);
					//print $mailContent;
				if($res)
					die('Mail envoyé');
				else
					die('Mail non envoyé');
				break;
				case 'actif':
				case 'inactif':
				$sql = $conn->prepare('update etudiants set statut=:action where id=:id');
				$sql->execute(array(
					':action' => $_REQUEST['action'],
					':id' => $_REQUEST['id'],
					));
				break;
				case 'del':
				supprimer(T_ETUDIANTS,$_REQUEST['id']);
				break;
				case 'Supprimer': 
					// foreach($ids as $id){
					// 	supprimer(T_ETUDIANTS,$id);
					// }
				// $date = '19/02/2017';
				// print '<pre>';
				// print_r(explode('/',$date));
				// print '</pre>';
				// pre($_REQUEST);
				supprimerAll(T_ETUDIANTS,implode($_REQUEST['ids'],','));

				break;
				case 'ajouter':
				case 'Enregistrer':

				if ($_FILES["cni"]["error"] == UPLOAD_ERR_OK) {
					$tmp_name = $_FILES["cni"]["tmp_name"];
					$cni = $_FILES["cni"]["name"];
					move_uploaded_file($tmp_name, "$uploads_dir/$cni");
				}

				if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
					$tmp_name = $_FILES["image"]["tmp_name"];
					$name = $_FILES["image"]["name"];
					move_uploaded_file($tmp_name, "$uploads_dir/$name");
				}
				$sql = 'delete from etudiants where id = '.$_REQUEST['id'];
				$conn->query($sql);
				$insert = $conn->prepare('INSERT INTO etudiants (id,nom,prenom,age,image,cni) VALUES (:id,:nom,:prenom,:age,:image,:cni)');
				$insert->execute(array(
					':nom' => $_POST['nom'],
					':prenom' => $_POST['prenom'],
					':age' => $_POST['age'],
					':id' => $_POST['id'],
					':image' => $name,
					':cni' => $cni,
					));
				break;
				default:break;
			}
		}

		$champ = (isset($_REQUEST['champ']))?$_REQUEST['champ']:'id';
		$ordre = (isset($_REQUEST['ordre']))?$_REQUEST['ordre']:'asc';
		if($ordre=='desc')
			$ordre = 'asc';
		else
			$ordre = 'desc';

		$sql = 'select * from etudiants order by '.$champ.' '.$ordre;
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
	<?php include('form.tpl'); ?>
<?php endif; ?>

<table border="1" cellpadding="0" cellspacing="0" width="90%" align="center">
	<thead>
		<tr>
			<td align="center"><input type="checkbox" id="selectAll"/></td>
			
			<th align="center"><a href="?champ=id&ordre=<?php print ($_REQUEST['champ']=='id')?$ordre:'asc' ?>" title="">Id</a></th>
			<th align="center">image</th>
			<th align="center">cni</th>
			<th align="center"><a href="?champ=nom&ordre=<?php print ($_REQUEST['champ']=='nom')?$ordre:'asc' ?>" title="">Nom</a></th>
			<th align="center">Prénom</th>
			<th align="center"><a href="?champ=age&ordre=<?php print ($_REQUEST['champ']=='age')?$ordre:'asc' ?>" title="">Age</a></th>
			<th align="center">statut</th>
			<th align="center">Supprimer</th>
			<th align="center">Modifier</th>
			<th align="center">Mail</th>
			
		</tr>
	</thead>
	<form action="" method="post" accept-charset="utf-8">
		<tbody>
			<?php foreach ($etudiants as $etudiant): ?>
				<tr>
					<td align="center">
						<input type="checkbox" name="ids[]" value="<?php print $etudiant['id'] ?>">


					</td>
					<td  align="center"><?php print $etudiant['id'] ?></td>
					<td><a download="<?php print $etudiant['image'] ?>" href="<?php print $uploads_dir ?>/<?php print $etudiant['image'] ?>" title="">
						<img src="<?php print $uploads_dir ?>/<?php print $etudiant['image'] ?>" alt="" width="50">
					</a></td>
					<td>
						<?php if($etudiant['cni']!=""): ?>
							<a download="<?php print $etudiant['cni'] ?>" href="<?php print $uploads_dir ?>/<?php print $etudiant['cni'] ?>" title="">Telecharger</a>
						<?php endif ?>

					</td>
					<td><?php print $etudiant['nom'] ?></td>
					<td><?php print $etudiant['prenom'] ?></td>
					<td><?php print $etudiant['age'] ?></td>
					<td><!-- <a href="?id=<?php print $etudiant['id'] ?>&action=statut&statut=<?php print ($etudiant['statut']=="actif")?'inactif':'actif' ?>"><?php print $etudiant['statut'] ?></a> -->
						<a href="?id=<?php print $etudiant['id'] ?>&action=<?php print ($etudiant['statut']=="actif")?'inactif':'actif' ?>"><?php print $etudiant['statut'] ?></a>
					</td>
					<td align="center"><a class="confirm" href="databases.php?id=<?php print $etudiant['id'] ?>&action=del" title="Supprimer"><i class="fa fa-trash-o"></i></a></td>
					<td  align="center"><a class="confirm" href="databases.php?id=<?php print $etudiant['id'] ?>&action=modifier" title="Supprimer"><i class="fa fa-edit"></i></a></td>
					<td><a href="?action=senMail" title="">Envoyer un mail</a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10" align="right"></td>
				<td align="center"><input type="submit" name="action" value="Supprimer"></td>
			</tr>
		</tfoot>
	</form>
</table>
</div>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#selectAll").change(function () {
			$("input:checkbox").prop('checked', $(this).prop("checked"));
		});

	})
</script>
</body>
</html>