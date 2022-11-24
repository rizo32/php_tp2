<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelEmploye');

class ControllerEmploye{

    // Pour afficher le registre d'employés
    public function index(){
        $employe = new ModelEmploye;
        // L'index fait intervenir des données de trois tables: employe, poste, ecole
        // Méthode du modele employé
        $select = $employe->selectDoubleJoin('poste', 'ecole', 'employePosteId', 'posteId', 'employeEcoleId', 'ecoleId', 'employeDateEmbauche');
        twig::render("employe-index.php", ['employes' => $select]);
    }

    // Pour afficher la page de création d'employés
    public function create(){
       twig::render('employe-create.php');
    }

    // Pour insérer les employés dans la base de données
    public function store(){
     $employe = new ModelEmploye;
    // Pour ajouter la date d'aujourd'hui comme date d'embauche sans passer par le formulaire
    $_POST['employeDateEmbauche'] = (new DateTime())->format('Y-m-d');
    $insert = $employe->insert($_POST);

    requirePage::redirectPage('employe');
    }

    // Fait intervenir des données de trois tables: employe, poste, ecole
    public function show($employeId){
        $employe = new ModelEmploye;
        $selectEmploye = $employe->selectIdJoin($employeId, 'poste', 'ecole', 'employePosteId', 'posteId', 'employeEcoleId', 'ecoleId');
        twig::render('employe-show.php', ['employe' => $selectEmploye]);
    }

    // Pour afficher la page de modification d'employé
    public function edit($employeId){
        $employe = new ModelEmploye;
        $selectEmploye = $employe->selectId($employeId);
        twig::render('employe-edit.php', ['employe' => $selectEmploye]);
    }

    // Pour modifier les information d'un employé précis
    public function update(){
        $employe = new ModelEmploye;
        $update = $employe->update($_POST);
        RequirePage::redirectPage('employe/show/'.$_POST['employeId']);
    }

    // Pour supprimer les information d'un employé précis
    public function delete(){
        $employe = new ModelEmploye;
        $delete = $employe->delete($_POST['employeId']);
        RequirePage::redirectPage('employe');
    }
}
?>
