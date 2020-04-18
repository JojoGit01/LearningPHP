<?php
$notes = [10, 20, 'eleve', 50];

$eleve = [
		'nom' => 'Doe',
		'prenom' => 'Marc', 
		'notes' => [10,20,15]
	];

echo $eleve ['nom'];
echo $eleve ['notes'][1];
$eleve[] = 'JojoGood';
print_r($eleve['notes']); //print_r : représente de maniere codé

//Tableau a double dimension
	$classe = [
		[
			'nom' => 'Doe',
			'prenom' => 'Marc', 
			'notes' => [10,2,12]
		],
		[
			'nom' => 'Doe',
			'prenom' => 'Marc', 
			'notes' => [20,15,13]
		]
	];
	echo $classe[1]['notes'][1];
?>