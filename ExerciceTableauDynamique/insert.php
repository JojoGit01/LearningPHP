<?php
$dsn = 'mysql:dbname=PDOphp;host=127.0.0.1';
$user = 'Jojo';
$password = 'bonjour';
try {
    $pdo = new PDO($dsn, $user, $password,[
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $e) {
    echo 'Connexion échouée :' .$e->getMessage();
}

$errors = null;
try {
    if(isset($_POST['name'], $_POST['price'], $_POST['address'], $_POST['city'])){
        $query = $pdo->prepare('INSERT INTO products (name, price, address, city) VALUES (:name, :price, :address, :city)');
        $query->execute([
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'address' => $_POST['address'],
            'city' => $_POST['city']
        ]);
        header('Location: index.php');
    }
} catch(PDOException $e) {
    $error = $e->getMessage();
}

?>
<?php if($error): ?>
<div><?= $error ?></div>
<?php else: ?> 
<form action="" method="post">
    <div>
        <input type="text" name="name" placeholder="Entrez nom">
        <br>
        <input type="number" name="price" placeholder="prix">
        <br>
        <textarea name="address" placeholder="Entrez adress"></textarea>
        <br>
        <input type="text" name="city" placeholder="ENtrez city">
        <br>
        <button>Insérer</button>
    </div>
</form>
<?php endif ?>