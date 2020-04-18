<?php
// Ce n'est pas bon mais c'est en gros //
// Video 36 : Le routeur //
// Voir ob_start Video 37 : Grafikart //
require '../../vendor/autoload.php';
$url = $_SERVER['REQUEST_URL'];
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');

$match = $router->match();
if (is_array($match)) {
    if(is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
        $params = $match['params'];
        require "../templates/{$match['target']}.php";
    }
} else {
    echo "Erreur 404";
}
