<?php

require_once "Personne.php";

class Etudiant extends Personne {
    private $nom;
    private $prenom;
    private $annee;
    private $maison;
    private $contactNom;
    private $contactPrenom;
    private $contactTelephone;

    public function __construct($nom, $prenom, $annee, $maison, $contactNom, $contactPrenom, $contactTelephone) {
        $this->etudiantNom=$nom;
        echo "<td>".$this->name."</td>";
        $this->etudiantPrenom=$prenom;
        echo "<td>".$this->address."</td>";
        $this->etudiantAnnee=$annee;
        echo "<td>".$this->zipCode."</td>";
        $this->etudiantMaisonId=$maison;
        echo "<td>".$this->phone."</td>";
        $this->etudiantContactNom=$contactNom;
        echo "<td>".$this->email."</td>";
        $this->etudiantContactPrenom=$contactPrenom;
        echo "<td>".$this->email."</td>";
        $this->etudiantContactTelephone=$contactTelephone;
        echo "<td>".$this->email."</td>";
    }
}

class Ecole {
    private $nom;
    private $prenom;
    private $annee;
    private $maison;
    private $contactNom;
    private $contactPrenom;
    private $contactTelephone;

    public function __construct($nom, $prenom, $annee, $maison, $contactNom, $contactPrenom, $contactTelephone) {
        $this->etudiantNom=$nom;
        echo "<td>".$this->name."</td>";
        $this->etudiantPrenom=$prenom;
        echo "<td>".$this->address."</td>";
        $this->etudiantAnnee=$annee;
        echo "<td>".$this->zipCode."</td>";
        $this->etudiantMaisonId=$maison;
        echo "<td>".$this->phone."</td>";
        $this->etudiantContactNom=$contactNom;
        echo "<td>".$this->email."</td>";
        $this->etudiantContactPrenom=$contactPrenom;
        echo "<td>".$this->email."</td>";
        $this->etudiantContactTelephone=$contactTelephone;
        echo "<td>".$this->email."</td>";
    }
}