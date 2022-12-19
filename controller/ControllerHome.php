<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelLog');


class ControllerHome{

    public function index(){
        // Chaque changement de page entraine une insertion de données dans le log
        $log = new ModelLog;
        $log->store();

      twig::render("home-index.php");
    }

    public function error(){
        $log = new ModelLog;
        $log->store();

        twig::render("home-error.php");
    }
}
