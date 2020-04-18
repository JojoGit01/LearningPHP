<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biens immobilier</title>
    </head>
    <body>

    <?php
    require_once 'vendor/autoload.php';
    use App\NumberHelper;
    use App\URLHelper;
    use App\TableHelper;
    define('PER_PAGE', 20);

    //A SAVOIR :
    //number_format : Formate un nombre pour l'affichage
    //require_once 'class/Post.php';
    // in_array : Regarde si la valeur est dans le tableau 
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
    

    $query = "SELECT * FROM products";
    $queryCount = "SELECT COUNT(id) as count FROM products";
    $params = [];
    $sortable = ["id", "name", "city", "price", "address"];

    //Rechercher par ville
    if(!empty($_GET['q'])){
        $query .= " WHERE city LIKE :city";
        $queryCount .= " WHERE city LIKE :city";
        $params['city'] = '%' . $_GET['q'] . '%';
    }

    // Organisation
    if(!empty($_GET['sort']) && in_array($_GET['sort'], $sortable)){
        $direction = $_GET['dir'] ?? 'asc';
        if(!in_array($direction, ['asc', 'desc'])){
            $direction = 'asc';
        }
        $query .= " ORDER BY " . $_GET['sort'] . " $direction";
    }

    // Pagination
    $page = (int)($_GET['p'] ?? 1);
    $offset = ($page -1) * PER_PAGE;

    $query .= " LIMIT " . PER_PAGE . " OFFSET $offset";

    $statement = $pdo->prepare($query);
    $statement->execute($params);
    //$posts = $statement->fetchAll(PDO::FETCH_CLASS, 'Joo\Post');
    $posts = $statement->fetchAll();

    $statement = $pdo->prepare($queryCount);
    $statement->execute($params);
    $count = (int)$statement->fetch()->count;
    $pages = ceil($count / PER_PAGE);      //ceil : arrondir a la virgule supérieur

    ?>
    <h1>Les biens immobilier</h1>
    <form action="">
        <div>
            <input type="text" name="q" value="<?= htmlentities($_GET['q'] ?? null) ?>"> <!-- q : type de recherche -->
        </div>
        <button>Rechercher</button>
    </form>
            
    <div class="container">
        <table>
            <thead>
            <tr>
                <th><?= TableHelper::sort('id', 'ID', $_GET) ?></th>
                <th><?= TableHelper::sort('name', 'Nom', $_GET) ?></th>
                <th><?= TableHelper::sort('price', 'Prix', $_GET) ?></th>
                <th><?= TableHelper::sort('city', 'Ville', $_GET) ?></th>
                <th><?= TableHelper::sort('address', 'Adresse', $_GET) ?></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post): ?>
                <tr>
                    <td><?= $post->id ?></td>
                    <td><?= $post->name ?></td>
                    <td><?= NumberHelper::price($post->price) ?></td>
                    <td><?= $post->address ?></td>
                    <td><?= $post->city ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?php if ($pages > 1 && $page > 1): ?>
        <a href="?<?= URLHelper::withParam($_GET, "p", $page-1) ?>">Page précéente</a>
    <?php endif ?>
    <?php if ($pages > 1 && $page < $pages): ?>
        <a href="?<?= URLHelper::withParam($_GET, "p", $page+1) ?>">Page suivante</a>
    <?php endif ?>
    <br>
    <a href="insert.php">Insérer des données </a>
    </body>
</html>



