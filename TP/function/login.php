<?php
$erreur = null;
if(!empty($_POST['pseudo']) && !empty('motdepasse')) {
	if($_POST['pseudo'] === 'John' && $_POST['motdepasse'] === 'Doe'){
		session_start();
		$_SESSION['connecte'] = 1;
		header('Location: dashboard.php');
		exit();
	}else{
		$erreur = "Identifiant incorrects";
	}
}
require_once 'auth.php';
if(est_connecte()){
	header('Location: dashboard.php');
	exit();
}
?>
<?php if($erreur): ?>
	<?= $erreur ?>
<?php endif; ?>
<form action="" method="post">
	<div class="form-group">
		<input type="text" name="pseudo" placeholder="Nom d'utilisateur">
	</div>
	<div class="form-group">
		<input type="password" name="motdepasse" placeholder="Entrez un mot de passe">
	</div>
	<button type="submit">Se connecter </button>
</form>

