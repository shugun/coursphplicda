<?php
$heure = date('h');
if( $heure == 12)
	print 'midi';
else 
	print 'pas midi';

print '<br>';

print($heure == 12)?'midi':'pas midi';

$variable = ($heure == 12)?'midi':'pas midi';
print '<br>';
print $variable;

// if($heure < 12):
// 	print 'Bonjour <br>';
// 	print 'un petit café';
// else:
// 	print 'Bonsoir';
// 	print ' un petit thé ';
// endif;

?>