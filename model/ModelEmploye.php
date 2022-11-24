<?php

class ModelEmploye extends Crud {

    protected $table = 'employe';
    protected $primaryKey = 'employeId';
    protected $fillable = ['employeId', 'employeNom', 'employePrenom', 'employeDateEmbauche', 'employeEcoleId', 'employePosteId'];

    // Pour créer un régistre avec (double) join
    public function selectDoubleJoin($table2, $table3, $field1, $field2, $field3, $field4, $champOrdre, $ordre='ASC'){
        $sql = "SELECT * FROM $this->table
                            LEFT JOIN $table2 ON $field1 = $field2
                            LEFT JOIN $table3 ON $field3 = $field4
                ORDER BY $champOrdre $ordre";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }
}

?>