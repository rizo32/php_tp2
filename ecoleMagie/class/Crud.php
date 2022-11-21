<?php

// Connexion PDO
class Crud extends PDO {
    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=e2295331; port=3306; charset=utf8', 'e2295331', 'a1KDLCwOPsYmOSiR37yc');
    }

    // Pour créer un régistre
    public function select($table, $field='id', $order='ASC' ){
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }
    
    // Pour acquérir des informations provenant d'une instance
    public function selectId($table, $value, $field = 'employeId', $url = 'client-index.php'){
        $sql ="SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            return $stmt->fetch();
        }else{
            header("location: $url");
        }
    }

    // Pour acquérir des informations provenant d'une table jointe
    public function selectJoin($table1, $table2, $field1, $field2, $value){
        $sql = "SELECT * FROM $table1 LEFT JOIN $table2 ON $field1 = $field2 WHERE $field2 = :$field2";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field2", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $stmt->fetch();
    }

    // Pour créer une nouvelle instance
    public function insert($table, $data){
        $nomChamp = implode(", ",array_keys($data));
        $valeurChamp = ":".implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";
        
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            header("location: employe-index.php");
        }
    }

    // Pour modifier une instance
    public function update($table, $data, $champId = 'employeId'){
        $champRequete = null;
        foreach($data as $key=>$value){
            $champRequete .= "$key = :$key, ";
        }
        $champRequete = rtrim($champRequete, ", ");

        $sql = "UPDATE $table SET $champRequete WHERE $champId = :$champId";

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            header("location: employe-show.php");
        }
    }

    // Pour supprimer une instance
    public function delete($table, $id, $champId = 'employeId'){
        $sql = "DELETE FROM $table WHERE $champId = :$champId";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champId", $id);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            header("location: employe-index.php");
        }
    }
}

?>