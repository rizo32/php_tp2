<?php
require_once "class/Crud.php";

$Crud = new Crud;

$employe = $Crud->select("employe", "employePosteId", "ASC");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css"> 
    <title>Équipe</title>
</head>
<body>
    <nav>
        <a href="employe-index.php">Registre du personnel</a>
        <a href="employe-create.php">Hogwards embauche!</a>
    </nav>
    <main>
        <h1>Voici votre équipe</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Poste</th>
                    <th>Date d'embauche</th>
                    <th>École</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($employe as $row){
                        $ecole = $Crud->selectJoin("ecole", "employe", "ecoleId", "employeEcoleId", $row['employeEcoleId']);

                        $poste = $Crud->selectJoin("poste", "employe", "posteId", "employePosteId", $row['employePosteId']);
                ?>
                    <tr>
                        <td><a href="employe-show.php?employeId=<?= $row['employeId']; ?>"><?php echo $row['employeNom']; ?></a></td>
                        <td><?php echo $row['employePrenom']; ?></td>
                        <td><?php echo $poste['posteNom']; ?></td>
                        <td><?php echo $row['employeDateEmbauche']; ?></td>
                        <td><?php echo $ecole['ecoleNom']; ?></td>
                    </tr>
                <?php       
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>