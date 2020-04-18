<?php 
require '../vendor/autoload.php';
use App\App;
session_start();
$auth = App::getAuth();
$error = false;

//Permet de ne pas revenir en arriére quand on est connécte
if ($auth->user() !==null){
    header('Location: index.php');
    exit();
}


if(!empty($_POST)){
    $user = $auth->login($_POST['username'], $_POST['password']);
    if($user){
        header('Location: index.php?login=1');
        exit();
    }
    $error = true;
}
?>
<!--
/*$pass = password_hash("Hello", PASSWORD_DEFAULT);
echo $pass;*/-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <h1>Se connecter</h1>

    <?php if($error): ?>
    <div>
        Identifiant ou mot de passe incorrect
    </div>
    <?php endif ?>

    <?php if (isset($_GET['forbid'])): ?>
    <div>L'accés a la page est interdite</div>
    <?php endif ?>

    <form action="" method="post">
        <div>
            <input type="text" name="username" placeholder="Pseudo">
        </div>
        <div>
            <input type="password" name="password" placeholder="Mot de passe">
        </div>
            <button>Se connecter</button>
    </form>
</body>
</html>