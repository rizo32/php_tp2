<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelLog');

class ControllerLog{

    // Pour afficher le registre de Log
    public function index(){
        CheckSession::sessionAuth();
        if ($_SESSION['privilegeId'] == 1){
            $log = new ModelLog;
            // L'index fait intervenir des données de trois tables: employe, poste, ecole
            // Méthode du modele employé
            $select = $log->selectIdJoin('employe', 'logEmployeId', 'employeId');
            twig::render("log-index.php", ['logs' => $select]);
        }else{
            requirePage::redirectPage('home/error');
        }
    }


    // Pour insérer les employés dans la base de données
    public function store(){
        // $validation = new Validation;
        // extract($_POST);
        // $validation->name('nom')->value($employeNom)->pattern('alpha')->required()->max(45);
        // ne regarde pas si le nom est le même, seulement si ça fit le format
        // $validation->name('employeCourriel')->value($employeCourriel)->pattern('email')->required()->max(50);
        // $validation->name('employeMotDePasse')->value($employeMotDePasse)->max(20)->min(6);
        // $validation->name('privilege_id')->value($privilege_id)->pattern('int')->required();

        // if($validation->isSuccess()){
            $log = new ModelLog;
            $options = [
                'cost' => 10,
            ];
            // Pour ajouter la date d'aujourd'hui comme date d'embauche sans passer par le formulaire
            $_POST['logDate'] = (new DateTime())->format('Y-m-d');

            $_POST['logAdresseIP'] = $_SERVER['REMOTE_ADDR'];

            if($_SESSION['employeId']){
                $_POST['logEmployeId'] = $_SESSION['employeId'];
            }
            $insert = $log->insert($_POST);
        // }else{
        //     $errors = $validation->displayErrors();
        // }
    }

}
?>
