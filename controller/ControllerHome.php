<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelLog');


class ControllerHome{

    public function index(){
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
