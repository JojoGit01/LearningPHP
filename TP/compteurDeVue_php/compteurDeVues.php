<?php

function ajouter_vue() {
	$fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
	$fichier_journalier = $fichier . '-' . date('Y-m-d');
	incrementer_compteur($fichier);
	incrementer_compteur($fichier_journalier);
}

function incrementer_compteur(string $fichier) : void{
	$compteur = 1;
	if (file_exists($fichier)) {
		$compteur = (int)file_get_contents($fichier);
		$compteur++;
	}
	file_put_contents($fichier, $compteur);
}

function nombre_vues() : string {
	$fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
	return file_get_contents($fichier);
}

/*
function nombre_vue_mois(int $year, int $mois){
	//str_pad : compléte une chaine jusqua une taille donnée //
	$mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
	//glob($fichier) : glob -> renvoie le chemin
}
*/