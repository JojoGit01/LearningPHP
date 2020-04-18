<?php

$d1 = '2014-01-01';
$d2 = '2019-04-01';

$date = new DateTime($d1);		// Création de l'objet //
$date2 = new DateTime($d2);		// Création de l'objet //
$diff = $date->diff($date2, true);
echo "Il y a {$diff->y} années, {$diff->m} mois et {$diff->d} jours de différences";
//$days = $date->diff($date2, true)->days;
//echo "Il y a {$days} jours de différence";

//$date->modify('+1 month'); 	// Modifier de 1 mois
//echo $date->format('d/m/Y');	//Format de date

// Date interval //
$dateInterval = new DateTime('2019-01-01');
$interval = new dateInterval('P1M1DT1M');
$date->add($interval);