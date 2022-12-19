<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelLog');
RequirePage::requireModel('ModelEmploye');
RequirePage::requireModel('ModelPrivilege');

class ControllerEmploye{

    // Pour afficher le registre d'employés
    public function index(){
        CheckSession::sessionAuth();

        // Chaque changement de page entraine une insertion de données dans le log
        $log = new ModelLog;
        $log->store();

        // L'index fait intervenir des données de trois tables: employe, poste, ecole
        // Méthode du modele employé
        $employe = new ModelEmploye;
        $select = $employe->selectDoubleJoin('poste', 'ecole', 'employePosteId', 'posteId', 'employeEcoleId', 'ecoleId', 'employeDateEmbauche');
        twig::render("employe-index.php", ['employes' => $select]);
    }

    // Pour afficher la page de création d'employés
    public function create(){
        // Pour vérifier l'authentification
        CheckSession::sessionAuth();
        $log = new ModelLog;
        $log->store();

        if ($_SESSION['privilegeId'] == 1 || $_SESSION['privilegeId'] == 2){
            $privilege = new ModelPrivilege;
            $selectPrivilege = $privilege->select('privilegeId');
            twig::render('employe-create.php', ['privileges' => $selectPrivilege]);
        }else{
            requirePage::redirectPage('home/error');
        }
    }

    // Pour insérer les employés dans la base de données
    public function store(){
        $log = new ModelLog;
        $log->store();

        if($_SESSION['privilegeId']==2){
            $_POST['employePosteId'] = 3; 
        }

        $validation = new Validation;
        extract($_POST);
        $validation->name('employeNom')->value($employeNom)->pattern('alpha')->required()->max(45);
        $validation->name('employePrenom')->value($employePrenom)->pattern('alpha')->required()->max(45);
        $validation->name('employeCourriel')->value($employeCourriel)->pattern('email')->required()->max(50);
        $validation->name('employeMotDePasse')->value($employeMotDePasse)->max(20)->min(6);

        if($validation->isSuccess()){
            $employe = new ModelEmploye;
            $options = [
                'cost' => 10,
            ];
            $_POST['employeMotDePasse']= password_hash($_POST['employeMotDePasse'], PASSWORD_BCRYPT, $options);
            // Pour ajouter la date d'aujourd'hui comme date d'embauche sans passer par le formulaire
            $tz = 'America/Toronto';
            $timestamp = time();
            $dt = new DateTime("now", new DateTimeZone($tz));
            $dt->setTimestamp($timestamp);
            $_POST['employeDateEmbauche'] = $dt->format('Y-m-d');

            $insert = $employe->insert($_POST);
            requirePage::redirectPage('employe/index');
        }else{
            $errors = $validation->displayErrors();
            twig::render('employe-create.php', ['errors' => $errors, 'employe' => $_POST]);
        }
    }

    // pour faire le login des employés
    public function login(){
        $log = new ModelLog;
        $log->store();

        twig::render('employe-login.php');
    }

    // authentification
    public function auth(){
        $validation = new Validation;
        extract($_POST);
        if(isset($employeCourriel) && isset($employeMotDePasse)){
            $validation->name('employeCourriel')->value($employeCourriel)->pattern('email')->required()->max(45);
            $validation->name('employeMotDePasse')->value($employeMotDePasse)->required();
        }

        if($validation->isSuccess()){
            $employe = new ModelEmploye;
            $checkEmploye = $employe->checkEmploye($_POST);
            twig::render('employe-login.php', ['errors' => $checkEmploye, 'employe' => $_POST]);        
        }else{
            $errors = $validation->displayErrors();
            twig::render('employe-login.php', ['errors' => $errors, 'employe' => $_POST]);
        }
    }

    // log out
    public function logout(){
        session_destroy();
        requirePage::redirectPage('employe/login');
    }

    // Pour voir les info d'un employé selon son ID
    public function show($employeId){
        $log = new ModelLog;
        $log->store();
        
        $employe = new ModelEmploye;
        // Fait intervenir des données de trois tables: employe, poste, ecole
        $selectEmploye = $employe->selectIdJoin($employeId, 'poste', 'ecole', 'employePosteId', 'posteId', 'employeEcoleId', 'ecoleId');
        twig::render('employe-show.php', ['employe' => $selectEmploye]);
    }

    // Pour afficher la page de modification d'employé
    public function edit($employeId){
        $log = new ModelLog;
        $log->store();

        CheckSession::sessionAuth();

        // Vérifier que les privilges sont bien respectés
        if ($_SESSION['privilegeId'] == 1){
            $privilege = new ModelPrivilege;
            $selectPrivilege = $privilege->select('privilegeId');
            $employe = new ModelEmploye;
            $selectEmploye = $employe->selectId($employeId);
            twig::render('employe-edit.php', ['employe' => $selectEmploye], ['privileges' => $selectPrivilege]);
        }else{
            requirePage::redirectPage('home/error');
        }
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
