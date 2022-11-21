<?php
require_once "Classe/Crud.php";

$Crud = new Crud;

$client = $Crud ->select("client", "nom", "DESC");
/*
echo "<h1>Client</h1>";
print_r($client);

$produit = $Crud ->select("produit");
echo "<h1>Produit</h1>";
print_r($produit);*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Liste de client</h1>
        <table>
            <thead>

                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Postal Code</th>
                    <th>Courriel</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    foreach($client as $row) {
                ?>
                    <tr>
                        <td><a href="client-show.php?id=<?php echo $row['id']?>"><?= $row['nom'] ?></td>
                        <td><?= $row['adress'] ?></td>
                        <td><?= $row['postal_code'] ?></td>
                        <td><?= $row['courriel'] ?></td>
                    </tr>
                <?php
                    }
                ?>

            </tbody>
        </table>
    </main>
</body>
</html>