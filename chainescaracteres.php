<?php 

//Email valide ou pas : 


$chainescaracteres = 'ali rabia et les autres et moi';
print strtoupper($chainescaracteres); // strtolower
print '<br>';
$remplaceCa = 'Ali rabia   ';
// Enlève les espaces à gauche et a droite (rtrim, ltrim);
$remplaceCa = trim($remplaceCa);
$parCa= 'Mohammed';
$chainescaracteres = str_replace($remplaceCa,$parCa,$chainescaracteres);
print $chainescaracteres;
print '<br>';

$Jecherche = 'Mohammed';
print strpos($chainescaracteres,$Jecherche);
print '<br>';
print $chainescaracteres[5];
print '<br>';
print strlen($chainescaracteres);
print '<br>';
print substr($chainescaracteres,5,3);





?>