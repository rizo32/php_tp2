<?php

class ModelMaison extends Crud {

    protected $table = 'maison';
    protected $primaryKey = 'maisonId';
    protected $fillable = ['maisonId', 'maisonNom', 'maisonEmployeResponsable', 'maisonEcoleId'];

}

?>