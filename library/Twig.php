<?php

class Twig{

    static public function render($template, $data = array()){
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array('auto_reload' => true));
        // $twig->addGlobal('path', 'https://e2295331.webdev.cmaisonneuve.qc.ca/tp2ecolemagie/');
        $twig->addGlobal('path', 'http://maisonneuve/PHP/TP3/code/');
        $twig->addGlobal('cookie', $_COOKIE);
        require_once 'library/' . $_COOKIE['lang'] . '.php';

        $twig->addGlobal('lang', $lang);
        // $twig->addGlobal('path', 'http://localhost/PHP/TP3/code/');

        // if (session_status() === PHP_SESSION_NONE) {
        //     session_start();
        // }
        
        if(isset($_SESSION['fingerPrint']) and $_SESSION['fingerPrint'] === md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])){
            $twig->addGlobal('session', $_SESSION);
            $guest = false;
        }else{
            $guest = true;
        }
        $twig->addGlobal('guest', $guest);
        // $_SESSION['logDate'] = (new DateTime())->format('Y-m-d');


        echo $twig->render($template, $data);
    }
}

?> 