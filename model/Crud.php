<?php

// Connexion PDO
abstract class Crud extends PDO {
    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=ecolemagie; port=3306; charset=utf8', 'root', '');
        // parent::__construct('mysql:host=localhost; dbname=e2295331; port=3306; charset=utf8', 'e2295331', 'a1KDLCwOPsYmOSiR37yc');
    }

    // Pour créer un régistre
    public function select($champ='employeId', $order='ASC'){
        $sql = "SELECT * FROM $this->table ORDER BY $champ $order";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    
    // Pour acquérir des informations provenant d'une instance
    public function selectJoin($value, $table2, $field1, $field2){
        $sql = "SELECT * FROM $this->table
                         LEFT JOIN $table2 ON $field1 = $field2
                         ORDER BY $value DESC";
        $stmt  = $this->query($sql);
        return $stmt->fetchAll();
    }

    // Pour acquérir des informations provenant d'une instance
    public function selectId($value){
        $sql = "SELECT * FROM $this->table
                WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            return $stmt->fetch();
        }else{
            header("location: ../../home/error");
        }
    }

    // Pour acquérir des informations provenant d'une instance
    public function selectIdJoin($value, $table2, $table3, $field1, $field2, $field3, $field4){
        $sql = "SELECT * FROM $this->table
                         LEFT JOIN $table2 ON $field1 = $field2
                         LEFT JOIN $table3 ON $field3 = $field4       
                WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            return $stmt->fetch();
        }else{
            header("location: ../../home/error");
        }
    }

    // Pour créer un régistre avec (double) join
    public function selectDoubleJoin($table2, $table3, $field1, $field2, $field3, $field4, $champOrdre, $ordre='ASC'){
        $sql = "SELECT * FROM $this->table
                            LEFT JOIN $table2 ON $field1 = $field2
                            LEFT JOIN $table3 ON $field3 = $field4
                ORDER BY $champOrdre $ordre";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    // Pour créer une nouvelle instance
    public function insert($data){
        $data_keys = array_fill_keys($this->fillable, '');
        $data_map = array_intersect_key($data, $data_keys);
        $nomChamp = implode(", ",array_keys($data_map));
        $valeurChamp = ":".implode(", :", array_keys($data_map));
        $sql = "INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach($data_map as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            return $this->lastInsertId();
        }
    }

    // Pour modifier une instance
    public function update($data){
        $champRequete = null;
        foreach($data as $key=>$value){
            $champRequete .= "$key = :$key, ";
        }
        $champRequete = rtrim($champRequete, ", ");

        $sql = "UPDATE $this->table SET $champRequete WHERE $this->primaryKey = :$this->primaryKey";

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
           return true;
        }
    }

    // Pour supprimer une instance
    public function delete($id){

        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $id);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            return true;
        }
    }
}


?>