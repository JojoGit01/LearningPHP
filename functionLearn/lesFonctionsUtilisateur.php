<?php
//declare(strict_types=1); 	// Version strict
$nom = "Doe";
function bonjour ($prenom){
	global $nom;
	if($nom === null){
		return "Bonjour\n";
	}
	return 'Bonjour ' . $prenom . " " . $nom . "\n";
}
echo bonjour('Jojo');

function repondre_oui_non (?string $phrase = null){
	while(true){
		readline($phrase . "(o)ui / (n)on ");
		if($reponse === "o"){
			return true;
		}elseif($reponse === "n"){
			return false;
		}
	}
}
function demander_creneau($phrase = 'Veuillez entrez un creneau'){
	echo $phrase;
	while(true){
		$ouverture = (int)readline('Heure d ouverture :');
		if($ouverture >= 0 && $ouverture <= 23){
			break;
		}
	}
	while(true){
		$fermeture = (int)readline("Heure de fermeture :");
		if($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture){
			break;
		}
	}
}

function demander_creneaux(string $phrase = "Veuillez entrez vos créneaux") : array{
	$creneaux = [];
	$continuer = true;
	while ($continuer){
		$creneaux[] = demander_creneau();
		$continuer = repondre_oui_non('Voulez vous conitunuer ?');
	}
	return $creneaux;
}

function demo (string $param){
	var_dump($param);
}

//repondre_oui_non('Voulez vous continuer ?');
//$creneau = demander_creneau();
//$creneau2 = demander_creneau('Veuilleur entrez votre creneau');
$creneaux = demander_creneaux('Entrez vos créneaux');
var_dump($creneaux);
?>