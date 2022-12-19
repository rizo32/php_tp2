<?php

class ModelLog extends Crud {

    protected $table = 'log';
    protected $primaryKey = 'logId';
    protected $fillable = ['logId', 'logAdresseIP', 'logDate', 'logEmployeId', 'logPage'];

    // Pour insérer les logs dans la base de données
    public function store(){
            $log = new ModelLog;
            $options = [
                'cost' => 10,
            ];
            // Pour ajouter l'heure dans le bon fuseau
            $tz = 'America/Toronto';
            $timestamp = time();
            $dt = new DateTime("now", new DateTimeZone($tz));
            $dt->setTimestamp($timestamp);

            $_POST['logDate'] = ($dt)->format('Y-m-d H:i:s');

            $_POST['logAdresseIP'] = $_SERVER['REMOTE_ADDR'];

            // Aucune valeur si guest
            if(isset($_SESSION['employeId'])){
                $_POST['logEmployeId'] = $_SESSION['employeId'];
            }

            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                $url = "https://";   
            } else {
                $url = "http://";   
            }
            // Ajouter l'host   
            $url.= $_SERVER['HTTP_HOST'];   
                // Ajouter l'uri 
            $url.= $_SERVER['REQUEST_URI'];    

            $_POST['logPage'] = $url;

            $insert = $log->insert($_POST);
    }
}

?>