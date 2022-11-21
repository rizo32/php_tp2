<?php

class Crud extends PDO {

    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=ecommerce; port=3306; charset=utf8', 'root', '');
    }

    public function select($table, $field='id', $order='ASC' ){
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    public function selectId($table, $value, $field = 'id', $url = 'client-index.php'){
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
            return $this->lastInsertId();
        }
    }
    
    public function update($table, $data, $champId = 'id'){
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
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($table, $id, $champId = 'id', $url='client-index.php'){

        $sql = "DELETE FROM $table WHERE $champId = :$champId";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champId", $id);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            header('Location: ' . $url);
        }

    }
}


?>