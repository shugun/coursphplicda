<?php
$x = 5;
print '<ul>';
// for($i=1;$i<=$x;++$i){
// 	print '<li> Ligne numéro '.$i.'</li>';
// }

// $i=1;
// while($i<=$x){
// 	print '<li> Ligne numéro '.$i++.'</li>';
// }

// $i=1;
// do{
// 	print '<li> Ligne numéro '.$i++.'</li>';
// }
// while($i<=$x);
// print '</ul>';
$seconde = 2;//date('s');
print $seconde;
switch ($seconde) {
	case 1:
	case 3:
		print 'Première ou Troisème seconde';break;
	case 2:Print 'Deuxième seconde';
	case 4:Print 'Quatrième seconde';break;
	default : print 'Une seconde ';break;
}
?>