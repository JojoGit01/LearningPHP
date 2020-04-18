<?php
require 'Creneau.php';
$creneau = new Creneau(9, 12); 	//Instantation de creneau
$creneau2 = new Creneau(14, 16);

var_dump($creneau->intersect($creneau2));
echo $creneau->toHTML();
/*var_dump(	
	$creneau->inclusHeure(10),
	$creneau2->inclusHeure(10)
);*/


//$creneau->debut = 9;
//$creneau->fin = 12;
?>
<br>
<a href="testForm.php">Pour le chap 25 Statique</a>
<br>
<a href="mainCompteur.php">L'héritage</a>