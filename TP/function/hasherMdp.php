<?php

function hasherMdp(){
	//Hasher le mdp
	$password = 'Doe';
	//$password_hash = password_hash($password, PASSWORD_DEFAULT); 	//Sans signature de 12//
	$password_hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
	echo $password_hash;
	echo "<br>";
	//Vérifier le mdp
	$password_verify = password_verify($password, $password_hash);
	var_dump($password_verify);
}
hasherMdp();
?>

