<?php

class Twig{

    static public function render($template, $data = array()){
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array('auto_reload' => true));
        // $twig->addGlobal('path', 'https://e2295331.webdev.cmaisonneuve.qc.ca/tp2ecolemagie/');
        $twig->addGlobal('path', 'http://maisonneuve/PHP/TP3/code/');
        // $twig->addGlobal('cookie', $_SESSION);
        // On va chercher le glossaire de langue correspondant à la variable enregistrée dans les cookies
        if(!isset($_SESSION['lang'])){
            $_SESSION['lang'] = 'en';
        }

        require_once 'library/' . $_SESSION['lang'] . '.php';
        $twig->addGlobal('lang', $lang);
        
        // Log in
        if(isset($_SESSION['fingerPrint']) and $_SESSION['fingerPrint'] === md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])){
            $twig->addGlobal('session', $_SESSION);
            $guest = false;
        }else{
            $guest = true;
        }
        $twig->addGlobal('guest', $guest);

        echo $twig->render($template, $data);
    }
}

?> 