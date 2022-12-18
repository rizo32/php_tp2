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

    // Génération très basic de mot de passe à 8 caractères
    public function generationMotDePasse(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, strlen($alphabet) - 1);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function checkEmploye($data){
        extract($data);
        $sql = "SELECT * FROM $this->table
                         LEFT JOIN poste ON employePosteId = posteId
                         WHERE employeCourriel = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($employeCourriel));
        $count = $stmt->rowCount();
        if($count == 1){
            $employeInfo = $stmt->fetch();
            if(password_verify($employeMotDePasse, $employeInfo['employeMotDePasse'])){
                    
                // session_regenerate_id();
                // c'est ici qu'on pourrait faire un "salut"
                $_SESSION['employePrenom'] = $employeInfo['employePrenom'];
                $_SESSION['employeNom'] = $employeInfo['employeNom'];
                $_SESSION['employeId'] = $employeInfo['employeId'];
                $_SESSION['privilegeId'] = $employeInfo['postePrivilegeId'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                // $_SESSION['logAdresseIP'] = $_SERVER['REMOTE_ADDR'];

                
                // requirePage::redirectPage('employe');
                
            }else{
               return "<ul><li>Verifier le mot de passe</li></ul>";  
            }
        }else{
            return "<ul><li>Le courriel ne correspond pas à celui d'un employé</li></ul>";
        }
    } 

}

?>