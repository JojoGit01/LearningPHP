<?php
//Héritage
require_once 'Compteur.php';
$compteur = new Compteur('dataH');
$compteur->incrementer();
$vues = $compteur->recuperer();
?>
Il y a <?= $vues ?> visite<?php if($vues > 1): ?>s<?php endif; ?> sur le site