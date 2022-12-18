 <?php
//  RequirePage::requireModel('ModelLog');


class ControllerLangue{
    private $path = 'http://maisonneuve/PHP/TP3/code/';

    // Pour afficher le registre de Log
    public function fr(){
        if($_COOKIE['lang'] != 'fr'){
            setcookie('lang', 'fr', time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        // require_once 'library/' . $_COOKIE['lang'] . '.php';
        $lastPage = $_SERVER['HTTP_REFERER'];
        $lastPage = substr($lastPage, strlen($this->path));
        requirePage::redirectPage($lastPage);
    }
    
    // Pour afficher le registre de Log
    public function en(){
        if($_COOKIE['lang'] != 'en'){
            setcookie('lang', 'en', time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        // require_once 'library/' . $_COOKIE['lang'] . '.php';
        $lastPage = $_SERVER['HTTP_REFERER'];
        $lastPage = substr($lastPage, strlen($this->path));
        requirePage::redirectPage($lastPage);
    }
}
?>
