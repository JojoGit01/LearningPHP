<?php
// htmlentites : convertie tous les charactéres applicables en entier
$aDeviner = 150;
?>
<?php if (isset($_GET['chiffre'])): ?>
	<?php if($_GET['chiffre'] > $aDeviner): ?>
		Votre chiffre est trop grand
	<?php elseif ($_GET['chiffre'] < $aDeviner): ?>
		Votre chiffre est trop petit
	<?php else: ?>
		Bravo ! Vous avez devine le chiffre <?= $aDeviner ?>
	<?php endif ?>
<?php endif ?>
<form action ="traitementDesFormulaires.php" method="GET">
	<input type="number" name="chiffre" placeholder="Entre 0 et 1000" value="<?p= htmlentities($_GET['chiffre']) ?>">
	<input type="text" name="demo" value="test">
	<button type="submit">Deviner</button>
</form>