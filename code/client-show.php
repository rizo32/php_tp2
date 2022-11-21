<?php

if(ISSET($_GET['id'])){
    $id = $_GET['id'];
    require_once "class/Crud.php";
    $Crud = new Crud;
    $client = $Crud->selectId('client', $id);
    extract($client);
} else {
    header("Location: client-index.php");
}

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
    <p><strong>Nom</strong><?= $nom; ?></p>
    <p><strong>Addresse</strong><?= $adress; ?></p>
    <p><strong>Postal Code</strong><?= $postal_code; ?></p>
    <p><strong>Courriel</strong><?= $courriel; ?></p>
    <p><a href="client-edit.php?id=<?php echo $id; ?>">Modifier</a></p>
    <p><a href="client-index.php"><-</a></p>
</body>
</html>