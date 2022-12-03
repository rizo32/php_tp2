<?php

class Twig{

    static public function render($template, $data = array()){
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array('auto_reload' => true));
        // $twig->addGlobal('path', 'https://e2295331.webdev.cmaisonneuve.qc.ca/tp2ecolemagie/');
        $twig->addGlobal('path', 'http://localhost/PHP/TP3/code/');

        
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