<?php
// Session : C'est comme un cookie top secret l'utilisateur ne peut ni modifier, ni lire les informations //
//La session vit que pendant l'utilisateur est connectée sinon elle est perdu
//Video : Comment marche $_SESSION
session_start();
$_SESSION['role'] = 'administrateur'; 		//On ajoute une session
//unset($_SESSION['role'])			//On supprime 

//Session avec un tableau :
$_SESSION['user'] = [
	'username' => 'Jojo',
	'password' => '0000'
];