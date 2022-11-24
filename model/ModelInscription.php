<?php

class ModelInscription extends Crud {

    protected $table = 'inscription';
    protected $primaryKey = ['inscriptionEtudiantId', 'inscriptionCoursId'];
    protected $fillable = ['inscriptionEtudiantId', 'inscriptionCoursId', 'semestre'];

}

?>