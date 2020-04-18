<?php
$chiffre = null;

//Boucle Tant que
while ($chiffre !== 10){
	$chifre = (int)readline('Entrez une valeur : ');
	break;
}

//Boucle for : pour
for($i = 0; $i < 10; $i++){
	echo '- ' . $i . "\n"; 
}

//Boucle pour chaque
$notes = [10, 15, 16];
foreach ($notes as $note) {
	echo "- $note \n";
}

$eleve = [
	'cm2' => 'Jean',
	'cm1' => 'Marc'
];
foreach ($eleve as $classe => $eleve) {
	echo "$eleve est dans la classe $classe";
}

echo "<br>";

$eleves = [
	'cm2' => ['Jean', 'Marc', 'Jane'],
	'cm1' => ['Marc', 'Emilie']
];
foreach ($eleves as $classe => $listEleve) {
	echo "La classe $classe : <br>";
	foreach ($listEleve as $eleve) {
		echo "- $eleve <br>";
	}
	echo "<br>";
}

//Exercices entrainement
// 1 exercice
$notes = [];
while (true){
	$action = readline('Entrez une nouvelle note (ou \'fin\' pour terminer la saisie) : ');
	if($action === 'fin'){
		break;
	} else {
		$notes[] = (int)$action;
	}
	
}
foreach ($notes as $note) {
	echo "-  $note <br>";
}


// 2 exercice
//....
//Vers 20min video 8
?>