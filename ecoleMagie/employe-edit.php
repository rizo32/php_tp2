<?php
if(isset($_GET['employeId'])){
    $employeId = $_GET['employeId'];
    require_once "class/Crud.php";
    $Crud = new Crud;
    $employe = $Crud->selectId('employe', $employeId);
    extract($employe);
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
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Modification</title>
</head>
<body>
    <nav>
        <a href="employe-index.php">Registre du personnel</a>
        <a href="employe-create.php">Hogwarts embauche!</a>
    </nav>
    <main>
        <h2>Changez votre identité!</h2>
        <form action="employe-update.php" method="post">
            <input type="hidden" name="employeId" value="<?= $employeId;?>">
            <label>Nom 
                <input type="text" name="employeNom" value=<?= $employe['employeNom']; ?>>
            </label>
            <label>Prénom
                <input type="text" name="employePrenom" value=<?= $employe['employePrenom']; ?>>
            </label>
            <label>Votre poste
            <select name="employePosteId">
                <option value=1 <?php if($employe['employePosteId']==1){echo "selected";} ?>>Directeur</option>
                <option value=2 <?php if($employe['employePosteId']==2){echo "selected";} ?>>Professeur</option>
                <option value=3 <?php if($employe['employePosteId']==3){echo "selected";} ?>>Aide-cuisinier</option>
            </select></label>
            <label>École
            <select name="employeEcoleId">
                <option value=1 <?php if($employe['employeEcoleId']==1){echo "selected";} ?>>Hogwarts School of Witchcraft and Wizardry</option>
                <option value=2 <?php if($employe['employeEcoleId']==2){echo "selected";} ?>>Beauxbatons Academy of Magic</option>
                <option value=3 <?php if($employe['employeEcoleId']==3){echo "selected";} ?>>Castelobruxo</option>
                <option value=4 <?php if($employe['employeEcoleId']==4){echo "selected";} ?>>Durmstrang Institute</option>
                <option value=5 <?php if($employe['employeEcoleId']==5){echo "selected";} ?>>Ilvermorny</option>
                <option value=6 <?php if($employe['employeEcoleId']==6){echo "selected";} ?>>Mahoutokoro School of Magic</option>
                <option value=7 <?php if($employe['employeEcoleId']==7){echo "selected";} ?>>Uagadou School of Magic</option>
                <option value=8 <?php if($employe['employeEcoleId']==8){echo "selected";} ?>>Koldovstoretz</option>
            </select></label>
            <label>Date d'embauche
                <input type="date" name="employeDateEmbauche" value="<?= $employe['employeDateEmbauche']; ?>">
            </label>
            <input type="submit" value="Obliviate!"><!-- fait oublier, pour confirmer la modification de l'identité (I'm trying to be clever, gimme a break! :) -->
        </form>
        <form action="employe-delete.php" method="post">
            <input type="hidden" name="employeId" value="<?php echo $employeId;?>">
            <input type="submit" value="Avada Kedavra!">
        </form>
    </main>
    
</body>
</html>