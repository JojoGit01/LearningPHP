<?php
// Trés important pour savoir quand il se connecte et se déconnecte il n'as plus accées //

$nom = null;
if(!empty($_GET['action']) && $_GET['action'] === 'deconnecter'){
	unset($_COOKIE['utilisateur']);	//Supprime l'utilisateur
	setcookie('utilisateur', '', time() - 10);
}
if(!empty($_COOKIE['utilisateur'])){
	$nom = $_COOKIE['utilisateur'];
}
if(!empty($_POST['nom'])){
	setcookie('utilisateur', $_POST['nom']);
	$nom = $_POST['nom'];
}
?>

<?php 
$user = [
	'prenom' => 'Jojo',
	'nom' => 'Doe',
	'age' => 19
];
setcookie('utilisateur', serialize($user));	//Serialise les données de l'utilisateur
$utilisateur = $_COOKIE['utilisateur'];	//Récupere les données
var_dump(unserialize($utilisateur)); 	//Unserialize la donne de l'utilisateur
?>


<?php if($nom): ?>
	<h1>Bonjour <?= htmlentities($nom) ?></h1>
	<a href="profil.php?action=deconnecter">Se déconnecter</a>
<?php else: ?>
	<form action="" method="post">
		<div class="form-group">
			<input class="form-control" name="nom" placeholder="Entrez votre nom">
		</div>
		<button>Se connecter</button>
	</form>
<?php endif; ?>
<a href="exempleCookie.php">Exemple cookie </a>