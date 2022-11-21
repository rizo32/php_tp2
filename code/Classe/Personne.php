<?php

abstract class Personne {
    protected $Nom;
    protected $Prenom;
    abstract public function setNom($Nom);
    abstract public function getNom();
    abstract public function setPrenom($Prenom);
    abstract public function getPrenom();
}