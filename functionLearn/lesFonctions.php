<?php
$variable = readline();
print_r($variable); 	// Affiche quelque information -> Mieux lisible
var_dump($variable);	// Affiche plus d'information que le print_r
var_dump(123.4 , 12, "azeaze");

echo "<br>";

$mot = readline('Veuillez entrez un mot :');
$reverse = strtolower(strrev($mot));	// strrev : passe en chaine de caractére // strtolower: annuler les majuscule met tous en minuscule
if(strtolower($mot) === $reverse){
	echo 'Ce mot est un palyndrome';
}else{
	echo 'Ce mot n est pas un palynrome';
}

$notes = [10, 20, 13];
$noteReversed = array_reverse($notes); // Pour inverser les notes d'un tableau le 9 devient 0 ect '
$rangerNotes = sort($notes);	//Pour ranger les notes
array_push($notes, 16, 17);		// Ajouter des nombres dans le tableau  à paritr du denrier ou avant comme on le veut
$sum = array_sum($notes);	// La somme du tableau
$count = count($notes);		// Le nombre de notes 
echo "Vous avez ". round($sum / $count, 2) . " de moyenne";  // round() : arrondir
print_r($noteReversed);
//print_r($rangerNotes);

/*
exit() : Afficer un message et termine le script courant
die : Même chose
*/

//Exemple :
$insultes = ['merde', 'con'];
$asterisque = [];
foreach ($insultes as $insulte) {
	$asterisque[] =  substr($insulte, 0, 1) . str_repeat('*', strlen($insulte)); //Permet de marquer juste la premiere lettre : substr();
}
$phrase = readline('Entrez une phrase');

/*	// 1er methode de le faire
foreach ($insultes as $insulte) {
	$taille = strlen($insulte);	//Calcule la taille d'une chaine
	$replace = str_repeat('*', $taille);	//Répeter le mot qu'on veut
	$phrase = str_replace($insulte, $replace, $phrase);	//Remplace touts les occurences dans une chaine
}
*/

// 2 eme methode plus simple : 
$phrase = str_replace($insultes, $asterisque, $phrase);

echo $phrase;
?>