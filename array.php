<?php 

$tableau = array('ABDELAZIZ','HICHAM','HAMID','MOHAMED','ILHAM','HAMZA','MOHAMED SALEH','KAWTAR','OUTMANE','MOHAMMED','MOHAMMED','HAMZA','ABDELHAKIM','HIND','YAZID','FATIMA EZZAHRA','KHALIL','HAYTAM','OUSSAMA','ABDALLAH','OTHMANE','AMINA','ACHRAF','ADIL','AYOUB','WALID','MOHAMED ALI');
$tableau2 = array("nom"=>"ABDELAZIZ","NOM"=>"HICHAM");
//print '<pre>';
//shuffle($tableau);
//print_r(array_chunk($tableau, 4,true));


// $tableau2[] = 'ABDELAZIZ';
// $tableau2[] = 'ABDELAZIZ';
// $tableau2[] = 'ABDELAZIZ';
// $tableau2[] = 'ABDELAZIZ';
// $tableau2[] = 'ABDELAZIZ';
// $tableau2[] = 'ABDELAZIZ';

// print '<pre>';
// print_r($tableau);
// print '</pre>';
$etudiants = array();

$etudiants[455]["prenom"] = "ABDELAZIZ";
$etudiants[455]["nom"] = "AIT IDIR";
$etudiants[455]["age"] = 22;

$etudiants[1]["prenom"] = "AYOUB";
$etudiants[1]["nom"] = "AYOUB";
$etudiants[1]["age"] = 25;

$etudiants[5]["prenom"] = "ADIL";
$etudiants[5]["nom"] = "AYOUB";
$etudiants[5]["age"] = 13;

//print '<pre>';
//print_r($etudiants);
//print '</pre>';

?>
<table border="1" cellpadding="0" cellspacing="0" width="300px" align="center">
	<thead>
		<tr>
			<th align="center">Numéro</th>
			<th align="center">Nom</th>
			<th align="center">Prénom</th>
			<th align="center">Age</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($etudiants as $index=>$etudiant): ?>
		<tr>
			<td><?php print $index ?></td>
			<!-- <?php foreach ($etudiant as $key => $value): ?>
			<?php endforeach ?> -->
			<td><?php print $etudiant['nom'] ?></td>
			<td><?php print $etudiant['prenom'] ?></td>
			<td><?php print $etudiant['age'] ?></td>
			
		</tr>
	<?php endforeach ?>

	</tbody>
</table>

<!-- <table border="1" cellpadding="0" cellspacing="0" width="300px">
	<thead>
		<tr>
			<th align="center">Nom</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		for ($i=0; $i < count($tableau); $i++):?>
		<tr>
			<td><?php print $tableau[$i] ?></td>
		</tr>
	<?php endfor; ?>
</tbody>
</table>

<hr>

<table border="1" cellpadding="0" cellspacing="0" width="300px">
	<thead>
		<tr>
			<th align="center">Numéro</th>
			<th align="center">Nom</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$compteur =1;
		foreach($tableau2 as $index=>$valeur ):?>
		<tr>
			<td><?php print $compteur++ ?></td>
			<td><?php print $valeur ?></td>
		</tr>
	<?php endforeach; ?>
</tbody>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 -->