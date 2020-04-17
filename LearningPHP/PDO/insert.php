<?php
// DOnnées de la base de données : PDOphp
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

$success = null;
try {
	if(isset($_POST['name'], $_POST['content'])) {
		$query = $pdo->prepare('INSERT INTO posts (name, content, created_at) VALUES (:name, :content, :created)');
		$query->execute([
			'name' => $_POST['name'],
			'content' => $_POST['content'],
			'created' => time()
		]);
		header('Location: edit.php?id=' . $pdo->lastInsertId());
	}
	$query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
	$query->execute([
		'id' => $_GET['id']
	]);
	$post = $query->fetch(); 	//Récupere que 1 article
} catch (PDOException $e){
	$error = $e->getMessage();
}
?>
<p>
	<a href="index.php">Revenir au listing</a>
</p>

<?php if($success): ?>
	<div><?= $success ?></div>
<?php endif ?>

<?php if($error): ?>
	<div><?= $error ?></div>
<?php else: ?>
	<form action="" method="post">
		<div>
			<input type="text" name="name" value="">
		</div>
		<div>
			<textarea name="content"></textarea>
		</div>
		<button>Sauvegarder</button>
	</form>
<?php endif ?>
