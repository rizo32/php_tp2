<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelLog');

class ControllerLog{

    // Pour afficher le registre de Log
    public function index(){
        $log = new ModelLog;
        $log->store();
        CheckSession::sessionAuth();
        if ($_SESSION['privilegeId'] == 1){
            $log = new ModelLog;
            $select = $log->selectJoin('logId', 'employe', 'logEmployeId', 'employeId');
            twig::render("log-index.php", ['logs' => $select]);
        }else{
            requirePage::redirectPage('home/error');
        }
    }
}
?>
