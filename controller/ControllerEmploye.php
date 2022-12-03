<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelEmploye');
RequirePage::requireModel('ModelPrivilege');

class ControllerEmploye{

    // Pour afficher le registre d'employés
    public function index(){
        CheckSession::sessionAuth();
        $employe = new ModelEmploye;
        // L'index fait intervenir des données de trois tables: employe, poste, ecole
        // Méthode du modele employé
        $select = $employe->selectDoubleJoin('poste', 'ecole', 'employePosteId', 'posteId', 'employeEcoleId', 'ecoleId', 'employeDateEmbauche');
        twig::render("employe-index.php", ['employes' => $select]);
    }

    // Pour afficher la page de création d'employés
    public function create(){
        /* do I have to create new Model everytime?? */
        $employe = new ModelEmploye;
        $employeMotDePasse = $employe->generationMotDePasse();
        twig::render('employe-create.php');
        //    twig::render('employe-create.php', ['privileges' => $selectPrivilege]);
    }

    // Pour insérer les employés dans la base de données
    public function store(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($employeNom)->pattern('alpha')->required()->max(45);
        // ne regarde pas si le nom est le même, seulement si ça fit le format
        $validation->name('employeCourriel')->value($employeCourriel)->pattern('email')->required()->max(50);
        $validation->name('employeMotDePasse')->value($employeMotDePasse)->max(20)->min(6);
        // $validation->name('privilege_id')->value($privilege_id)->pattern('int')->required();

        if($validation->isSuccess()){
            $employe = new ModelEmploye;
            $options = [
                // Parce que je suis suiveux
                'cost' => 10,
            ];
            $_POST['employeMotDePasse']= password_hash($_POST['employeMotDePasse'], PASSWORD_BCRYPT, $options);
            // Pour ajouter la date d'aujourd'hui comme date d'embauche sans passer par le formulaire
            $_POST['employeDateEmbauche'] = (new DateTime())->format('Y-m-d');
            $insert = $employe->insert($_POST);
            requirePage::redirectPage('employe');
        }else{
            $errors = $validation->displayErrors();
            $privilege = new ModelPrivilege;
            // $selectPrivilege = $privilege->select();
            twig::render('employe-create.php', ['errors' => $errors, 'employe' => $_POST]);
            // twig::render('employe-create.php', ['errors' => $errors,'privileges' => $selectPrivilege, 'employe' => $_POST]);
        }
    }

    public function login(){
        twig::render('employe-login.php');
    }

    public function auth(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('employeCourriel')->value($employeCourriel)->pattern('email')->required()->max(50);
        $validation->name('employeMotDePasse')->value($employeMotDePasse)->required();

        if($validation->isSuccess()){

            $employe = new ModelEmploye;
            $checkEmploye = $employe->checkEmploye($_POST);
            

            twig::render('home-index.php', ['errors' => $checkEmploye, 'employe' => $employe]);
            // twig::render('employe-login.php', ['errors' => $checkEmploye, 'employe' => $_POST]);
        
        }else{
            $errors = $validation->displayErrors();
            twig::render('employe-login.php', ['errors' => $errors, 'employe' => $_POST]);
        }
    }


    public function logout(){
        session_destroy();
        requirePage::redirectPage('employe/login');
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
