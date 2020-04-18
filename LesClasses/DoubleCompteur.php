<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Compteur.php';
// Elle aura les mêmes proprétes et même méthodes de la classe qu'elle hérite : Héritage
class DoubleCompteur extends Compteur {

	const INCREMENT = 10;

	// public : Tous le monde peut y acceder 
	// private : la classe courante peut y accéder que elle seule
	// protected : La classe et les extends ont accées au données
	// const : Ne change jamais
	public function recuperer(): int {
		return 2 * parent::recuperer(); 	//Récuper l'element parent //
	}
	
}