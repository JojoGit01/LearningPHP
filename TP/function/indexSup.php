<?php
	if(session_status() === PHP_SESSION_NONE){
		session_start();
	}
?>
<h2>Test compteur de vue </h2>
<div class="vue">
	<?php
		require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'compteurDeVue_php' . DIRECTORY_SEPARATOR . 'compteurDeVues.php';
		ajouter_vue();
		$vues = nombre_vues();
	?>
	Il y a <?= $vues ?> visite sur le site<br>
	<a href="dashboard.php">TP dashboard </a>
</div>
<a href="hasherMdp.php">Chiffer les mot de passe </a>