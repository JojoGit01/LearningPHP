<?php
require '../vendor/autoload.php';
use App\App;
use App\Auth;

App::getAuth()->requireRole('Admin');
?>
Réservé a l'admin
