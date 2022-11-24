<?php

class ModelEmploye extends Crud {

    protected $table = 'employe';
    protected $primaryKey = 'employeId';
    protected $fillable = ['employeId', 'employeNom', 'employePrenom', 'employeDateEmbauche', 'employeEcoleId', 'employePosteId'];
}

?>