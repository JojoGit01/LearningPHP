<?php
require '../vendor/autoload.php';
use App\App;
App::getAuth()->requireRole('user', 'Admin');
?>
Réservée a l'utilisateur
