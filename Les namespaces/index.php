<?php
//Autoloader //
/*
    Aller dans le .ini de php 
        -> Activer : extension=openssl
    Site : https://getcomposer.org/download/ -> Suivre les instruction en code de ligne
    -> php composer.phar init
        -> On rentre les données du namespace ect..
    -> php composer.phar dump-autoload

    // Tres utile : namespace -> Directement quand on appuye on peut faire import class //

    // Librairies tierces //
    Voir sur Packagist
    //Pour installe un package :
    php composer.phar require ...
*/
require_once '../vendor/autoload.php';


//Ancien Code
use Jojo\GuestBook\Message;
use Jojo\GuestBook\GuestBook;
//Nouveau code plus explicite
/*
    use Jojo\GuestBook\{
        GuestBook,
        Message
    };
*/
//Utilisation de la classe Message qu'on a mis un ALIAS pour pouvoir l'utiliser
use Jojo\Contact\Message as ContactMessage;

// Plus besoin d'inclure tous sa avec un autoloader //
//require_once 'class/Message.php';
//require_once 'class/GuestBook.php';
//require_once 'class/contact/Message.php';

//Utiliser les namespaces
$message = new Message();                       // class/Message.php
$guestBook = new GuestBook();                   // class/GuestBook.php
$contactMessage = new ContactMessage();         // class/contact/Message.php
?>