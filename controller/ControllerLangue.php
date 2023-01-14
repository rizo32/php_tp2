 <?php

// Permet de faire la traduction...
class ControllerLangue{
    private $path = 'http://maisonneuve/PHP/TP3/code/';

    // Vers le français
    public function fr(){
        if($_SESSION['lang'] != 'fr'){
            setcookie('lang', 'fr', time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        // Pour ne pas changer de page lors du changement de langue
        $lastPage = $_SERVER['HTTP_REFERER'];
        $lastPage = substr($lastPage, strlen($this->path));
        requirePage::redirectPage($lastPage);
    }
    
    // Vers l'anglais
    public function en(){
        if($_SESSION['lang'] != 'en'){
            setcookie('lang', 'en', time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        // Pour ne pas changer de page lors du changement de langue
        $lastPage = $_SERVER['HTTP_REFERER'];
        $lastPage = substr($lastPage, strlen($this->path));
        requirePage::redirectPage($lastPage);
    }
}
?>
