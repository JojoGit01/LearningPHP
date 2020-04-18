<?php 
namespace App;
use PDO;
class Auth{

    private $pdo;
    private $loginPath;
    public function __construct(PDO $pdo, string $loginPath){
        $this->pdo = $pdo;
        $this->loginPath = $loginPath;
    }

    public function user(): ?User{
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $id = $_SESSION['auth'] ?? null;
        if ($id === null){
            return null;
        }
        $query = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$id]);
        $user = $query->fetchObject(User::class);
        return $user ?: null;
    }

    //Mettre ... : signifique qu'on pourra mettre plusieur paramétres qu'il sont des chaines de caractéres, cette variable sera un tableau !!!
    public function requireRole(string ...$roles): void  
    {
        $user = $this->user();
        if ($user === null || !in_array($user->role, $roles)){
            header("Location: {$this->loginPath}?forbid=1");
            exit();
        }
    }

    public function login(string $username, string $password): ?User{
        // Trouve l'utilisateur correspond au username
        $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $query->execute(['username' => $username]);

        //2 CHoix possible
        // 1ER CHOIX 
        //$query->setFectMode(PDO::FETCH_CLASS, User::class); //Utilisation de la classe grâce a un mode
        //$user = $query->fetch();    //Récuperer une seule ligne : fetch
        // 2ER CHOIX
        $user = $query->fetchObject(User::class);

        if($user === false) {
            return null;
        }
        //On vérifie password_verify que l'utilisateur corresponde
        if (password_verify($password, $user->password)){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['auth'] = $user->id;
            return $user;
        }
        return null;
    }
}
