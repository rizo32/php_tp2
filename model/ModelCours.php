<?php

class ModelCours extends Crud {

    protected $table = 'cours';
    protected $primaryKey = 'coursId';
    protected $fillable = ['coursId', 'coursNom', 'coursDescription', 'coursNiveau', 'coursEmployeId'];
}

?>