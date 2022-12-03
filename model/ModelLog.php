<?php

class ModelPoste extends Crud {

    protected $table = 'log';
    protected $primaryKey = 'logId';
    protected $fillable = ['logId', 'logAdresseIP', 'logDate', 'logEmployeId'];
}

?>