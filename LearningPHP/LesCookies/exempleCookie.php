<?php
//Ne pas faire pour les connexion assez dangereux //
$age = null;
if(!empty($_POST['birthday'])){
	setcookie('birthday', $_POST['birthday']);
	$_COOKIE['birthday'] = $_POST['birthday'];
}
if(!empty($_COOKIE['birthday'])){
	$birthday = (int)$_COOKIE['birthday'];
	$age = (int)date('Y') - $birthday;
}
?>

<?php if($age >= 18): ?>
	<h1>Du contenue réserve au adulte </h1>
<?php elseif ($age !== null): ?>
	<div>Vous n'avez pas l'age requis pour voir le contenu </div>
<?php else: ?>
<form action="" method="post">
	<div class="form-group">
		<select name="birthday" class="form-control">
			<?php for($i = 2010; $i > 1919; $i--): ?>
			<option value="<?= $i ?>"><?= $i ?></option>
			<?php endfor ?>
		</select>
	</div>
	<button type="submit">Envoyez</button>
</form>
<?php endif; ?>