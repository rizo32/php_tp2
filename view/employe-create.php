<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rizo e2295331">
    <link rel="stylesheet" href="{{ path }}css/style.css"> 
    <title>Création employé</title>
</head>
<body>
    <nav>
        <a href="{{ path }}">Accueil</a>
        <a href="{{ path }}employe/index">Registre du personnel</a>
        <a href="{{ path }}employe/create">Hogwards embauche!</a>
    </nav>

    <main>
        <h2>Formulaire d'embauche</h2>
        <h3>Hogwarts School of Witchcraft and Wizardry</h3>
        {{ dateAujourdhui }}
        <form action="{{ path }}employe/store" method="post">
            <label>Nom 
                <input type="text" name="employeNom">
            </label>
            <label>Prénom
                <input type="text" name="employePrenom">
            </label>
            <label>Poste
            <select name="employePosteId">
                <option value=2>Professeur</option>
                <option value=3>Aide-cuisinier</option>
            </select></label>
            <label>Courriel
                <input type="email" name="employeCourriel">
            </label>
            <label>Mot de passe temporaire
                <!-- l'input est text et non pas password pour que Dumbledor puisse le noter et le remettre à l'employé afin que ce dernier le change -->
                <input type="text" name="employeMotDePasse" value="{{ employeMotDePasse }}">
            <input type="hidden" name="employeEcoleId" value=1>
            <input type="submit" value="Wingardium Leviosa!">
        </form>
    </main>
</body>
</html>