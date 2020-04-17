<?php

include 'lesFonctionsUtilisateur.php';		// Inclut sans savoir si il existe

require 'lesFonctionsUtilisateur.php'; 		// require va voir si le fichier existe si non il ne continue pas // Inclut plein de foix

require_once 'lesFonctionsUtilisateur.php'	//Meilleure que require : Inclut le fichier que 1 seul foix // Ne pas définir plusieur foix la meme chose
var_dump(repondre_oui_non('Test'));