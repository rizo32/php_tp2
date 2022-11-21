<?php
$dateAujourdhui = new DateTime();
$dateAujourdhui = $dateAujourdhui->format('Y-m-d');
// Par défaut, date embauche = date insertion du formulaire
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css"> 
    <title>Création employé</title>
</head>
<body>
    <nav>
        <a href="employe-index.php">Registre du personnel</a>
        <a href="employe-create.php">Hogwarts embauche!</a>
    </nav>

    <main>
        <h2>Formulaire d'embauche</h2>
        <h3>Hogwarts School of Witchcraft and Wizardry</h3>
        <form action="employe-insert.php" method="post">
            <label>Nom 
                <input type="text" name="employeNom">
            </label>
            <label>Prénom
                <input type="text" name="employePrenom">
            </label>
            <label>Votre poste
            <select name="employePosteId">
                <option value=2>Professeur</option>
                <option value=3>Aide-cuisinier</option>
            </select></label>
            <input type="hidden" name="employeEcoleId" value=1>
            <input type="hidden" name="employeDateEmbauche" value="<?= $dateAujourdhui; ?>">
            <input type="submit" value="Wingardium Leviosa!">
        </form>
    </main>
</body>
</html>