<?php
require_once 'auth.php';
forcer_utilisateur_connecte();
require_once '../compteurDeVue_php/compteurDeVues.php';
$total = nombre_vues();
$annee = (int)date('Y');
$annee_selection = empty($_GET['annee']) ? $annee : (int)$_GET['annee'];
?>

<h1>TP dashboard</h1>
<div class="card">
	<div class="annee">
		<?php for($i = 0; $i < 5; $i++): ?>
		<a class="list" href="dashboard.php?annee=<?= $annee - $i ?>"> <?= $annee - $i ?> </a>
		<?php endfor ?>
	</div>
	<div class="card-body">
		<strong><?= $total ?></strong>
		Visite <?= $total > 1 ? 's' : '' ?> total
	</div>
</div>

<?php if(est_connecte()): ?>
	<li><a href="logout.php">Se déconnecter </a></li>
<?php endif ?>