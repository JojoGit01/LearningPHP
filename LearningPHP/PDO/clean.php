<?php
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
$pdo->beginTransaction();
$pdo->exec('UPDATE posts SET NAME = "demo" WHERE id = 3');
$pdo->exec('UPDATE posts SET content = "demoa" WHERE id = 3');
$post = $pdo->query('SELECT * FROM posts WHERE id = 3')->fetch();
var_dump($post);
//$pdo->query('DELETE FROM posts LIMIT 1'); 	//Pas utile pour cette exemple
$pdo->rollback();	//Revien en arrière
//$pdo->commit();