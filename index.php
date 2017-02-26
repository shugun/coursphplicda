<h1>hello world</h1>
<?php 
include('salut.php');
$i = 5;
define('NOMCONST','VALCONSTANTE');
print NOMCONST;
print '<br>';
if(!defined('NOMBRE'))
	define('NOMBRE',6);

print NOMBRE;
print '<br>';

print "Bonjour tous le monde";
print '<h2>hello world '.$i.' </h2>';


//include_once('salut.php');
//require('salut.php');
//require_once('salut.php');
print 'test';