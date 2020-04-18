<?php

use PHPUnit\Framework\TestCase;
use PDO;
/* Video 41 : Si jamais je veux faire des test
class AuthTest extends TestCase {

    public function testLogin() {
        $pdo = new PDO("sqlite::memory:", null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
        $pdo->query('CREATE TABLE users (username TEXT, password TEXT)');
        for ($i = 1; $i <= 10; $i++) {
            $password = password_hash("user$i", PASSWORD_BCRYPT);
            $pdo->query("INSERT INTO users (username, password) VALUES ('user$i', 'user$i')");
        }
        $auth = new Auth($pdo, "../public/login.php");
        $this->assertNull($auth->login('aze', 'aze'));
    }
}
*/