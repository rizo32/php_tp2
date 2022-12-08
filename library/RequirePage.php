<?php

class RequirePage{
    static public function requireModel($model){
        return require_once "model/$model.php";
    }
    static public function redirectPage($page){
        return header("Location: http://maisonneuve:7080/PHP/TP3/code/".$page);
        // return header("Location: http://localhost/PHP/TP3/code/".$page);
    }
}

?>