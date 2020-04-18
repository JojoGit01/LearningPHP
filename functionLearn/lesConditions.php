<?php
//readline : Permet de demander à l'utilisateur
//readline('Entrez votre note :');
// le == : Vérifie juste si c'est pareil
// le === : Vérifie en plus si le type de variable est le même 

//if, elseif, else
$note = (int)10;
if ($note > 10){
	echo 'Bravo vous avez la moyenne';
} elseif($note === 10){
	echo 'Vous avez la moyenne';
} else{
	echo 'Dommage vous n\'avers pas la moyenne';
}

//switch
$action = (int)readline('Entrez votre action : (1: attaquer, 2:defendre, 3: passer mon tour)');
switch ($action){
	case 1:
		echo 'J\'ataque';
		break;
	case 2:
		echo 'Je défend';
		break;
	case 3: 
		echo 'Je ne fais rien';
		break;
	default:
		echo 'Commande inconnue';
}

//Opérateur logique 
/*
	VRAI && VRAI = VRAI
	VRAI && FAUX = FAUX
	FAUX && FAUX = FAUX

	VRAI || VRAI = VRAI
	VRAI || FAUX = VRAI
	FAUX || FAUX = FAUX
*/
$heure = (int)10;
if((9 < $heure && $heure <= 12) || (14 <= $heure && $heure <= 17)){
	echo 'Le magasin sera ouvert';
} else{
	echo 'Le magasin est fermer';
}

?>