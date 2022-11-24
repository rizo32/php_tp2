<?php

class ModelEtudiant extends Crud {

    protected $table = 'etudiant';
    protected $primaryKey = 'etudiantId';
    protected $fillable = ['etudiantId', 'etudiantNom', 'etudiantPrenom', 'etudiantAnnee', 'etudiantMaisonId', 'etudiantContactNom', 'etudiantContactPrenom', 'etudiantContactTelephone'];

}

?>