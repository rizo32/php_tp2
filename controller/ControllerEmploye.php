<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelEmploye');

class ControllerEmploye{

    public function index(){
        $employe = new ModelEmploye;
        // L'index fait intervenir des données de trois tables: employe, poste, ecole
        $select = $employe->selectDoubleJoin('poste', 'ecole', 'employePosteId', 'posteId', 'employeEcoleId', 'ecoleId', 'employeDateEmbauche');
        twig::render("employe-index.php", ['employes' => $select]);
    }

    public function create(){
       twig::render('employe-create.php');
    }

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

    public function edit($employeId){
        $employe = new ModelEmploye;
        $selectEmploye = $employe->selectId($employeId);
        twig::render('employe-edit.php', ['employe' => $selectEmploye]);
    }

    public function update(){
        $employe = new ModelEmploye;
        $update = $employe->update($_POST);
        RequirePage::redirectPage('employe/show/'.$_POST['employeId']);
    }
    public function delete(){
        $employe = new ModelEmploye;
        $delete = $employe->delete($_POST['employeId']);
        RequirePage::redirectPage('employe');
    }
}
?>
