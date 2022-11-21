<?php
if(isset($_GET['employeId'])){
    $employeId = $_GET['employeId'];
    require_once "class/Crud.php";
    $Crud = new Crud;
    $employe = $Crud->selectId("employe", $employeId, "employeId");
    extract($employe);
    $ecole = $Crud->selectJoin("ecole", "employe", "ecoleId", "employeEcoleId", $employe['employeEcoleId']);
    $poste = $Crud->selectJoin("poste", "employe", "posteId", "employePosteId", $employe['employePosteId']);
}else{
    header('Location: employe-index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rizo e2295331">
    <link rel="stylesheet" href="assets/css/main.css"> 
    <title>Votre compte</title>
</head>
<body>
    <nav>
        <a href="employe-index.php">Registre du personnel</a>
        <a href="employe-create.php">Hogwarts embauche!</a>
    </nav>
    <main>
        <p><strong>Nom :</strong><?= " " . $employeNom; ?></p>
        <p><strong>Prénom :</strong><?= " " . $employePrenom; ?></p>
        <p><strong>Poste :</strong><?= " " . $poste['posteNom']; ?></p>
        <p><strong>Date d'embauche : </strong><?= " " . $employeDateEmbauche; ?></p>
        <p><strong>École : </strong><?= " " . $ecole['ecoleNom']; ?></p>
        <p><a href="employe-edit.php?employeId=<?= $employeId; ?>">Une potion de polynectar!<img src="assets/img/potion.png"></img></a></p> <!-- (Potion pour modifier l'apparence) -->
    </main>
</body>
</html>