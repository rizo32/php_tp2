<?php

class ModelEcole extends Crud {

    protected $table = 'ecole';
    protected $primaryKey = 'ecoleId';
    protected $fillable = ['ecoleId', 'ecoleNom', 'ecoleDateFondation'];
}

?>