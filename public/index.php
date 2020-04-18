<?php
require '../vendor/autoload.php';
use App\App;
$user = App::getAuth()->user();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
</head>
<body>
    <h1>Salut toi</h1>
    <?php if($user): ?>
        <h1>Tu est bien <?= $user->username ?> </h1>
        <a href="logout.php">Se déconnecter</a>
    <?php endif ?>
    <a href="login.php">Se connecter</a>
    <br><br>
    <a href="admin.php">Page réservé a l'admin</a>
    <a href="user.php">Page réservé a l'utilisateur</a>

</body>
</html>