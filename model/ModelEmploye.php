<?php

class ModelEmploye extends Crud {

    protected $table = 'employe';
    protected $primaryKey = 'employeId';
    protected $fillable = ['employeCourriel', 'employeMotDePasse', 'employeId', 'employeNom', 'employePrenom', 'employeMotDePasse', 'employeDateEmbauche', 'employeEcoleId', 'employePosteId'];

    // Pour créer un régistre avec (double) join
    public function selectDoubleJoin($table2, $table3, $field1, $field2, $field3, $field4, $champOrdre, $ordre='ASC'){
        $sql = "SELECT * FROM $this->table
                            LEFT JOIN $table2 ON $field1 = $field2
                            LEFT JOIN $table3 ON $field3 = $field4
                ORDER BY $champOrdre $ordre";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    public function checkEmploye($data){
        extract($data);
        $sql = "SELECT * FROM $this->table
                         LEFT JOIN poste ON employePosteId = posteId
                         WHERE employeCourriel = ?";
        $stmt = $this->prepare($sql);
        if(isset($employeCourriel)){
            $stmt->execute(array($employeCourriel));
        }
        $count = $stmt->rowCount();
        if($count == 1){
            $employeInfo = $stmt->fetch();
            if(password_verify($employeMotDePasse, $employeInfo['employeMotDePasse'])){
                    
                session_regenerate_id();
                $_SESSION['employePrenom'] = $employeInfo['employePrenom'];
                $_SESSION['employeNom'] = $employeInfo['employeNom'];
                $_SESSION['employeId'] = $employeInfo['employeId'];
                $_SESSION['privilegeId'] = $employeInfo['postePrivilegeId'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);

                requirePage::redirectPage('employe/index');
               
            }elseif($_COOKIE['lang'] == 'fr'){
               return "<ul><li>Vérifier le mot de passe</li></ul>";  
            }else{
                return "<ul><li>Check password</li></ul>";  
            }
        }elseif($_COOKIE['lang'] == 'fr'){
            return "<ul><li>Le courriel n'existe pas</li></ul>";
        }else{
            return "<ul><li>The email doesn't exist</li></ul>";
        }
    } 

}

?>