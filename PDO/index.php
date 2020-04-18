<?php
//Video 31 //
require_once 'class/Post.php';
// Données de la base de données : PDOphp
$dsn = 'mysql:dbname=PDOphp;host=127.0.0.1';
$user = 'Jojo';
$password = 'bonjour';
try {
    $pdo = new PDO($dsn, $user, $password,[
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
$error = null;
try {
	$query = $pdo->query('SELECT * FROM posts'); 	// La requête est directement faite //
	//On récupere tous dans la base du ->query : fetchAll
	//PDO::FETCH_CLASS : Initiliase une classe à utiliser dans le PDO
	$posts = $query->fetchAll(PDO::FETCH_CLASS, 'Post');			
} catch (PDOException $e){
	$error = $e->getMessage();
}
?>

<?php if($error): ?>
	<div><?= $error ?></div>
<?php else: ?>
<ul>
	<?php foreach ($posts as $post): ?>
	<h2><a href="edit.php?id=<?= $post->id ?>"><?= htmlentities($post->name) ?></a></h2>
	<p>Ecrit le <?= $post->created_at->format('d/m/Y à H:i') ?></p>
	<p>
		<?= nl2br(htmlentities($post->getExcerpt())) ?> <!--nl2br : Permet de sauter les lignes si il y en a de les respecter -->		
	</p>
	<?php endforeach ?>
</ul>
<?php endif ?>

<a href="insert.php">Insertion de données</a>
