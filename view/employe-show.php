<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rizo e2295331">
    <link rel="stylesheet" href="{{ path }}css/style.css"> 
    <title>Votre compte</title>
</head>
<body>
    <nav>
        <a href="{{ path }}">Accueil</a>
        <a href="{{ path }}employe/index">Registre du personnel</a>
        <a href="{{ path }}employe/create">Hogwards embauche!</a>
    </nav>
    <main>
        <p><strong>Nom :</strong>{{ employe.employeNom }}</p>
        <p><strong>Prénom :</strong>{{ employe.employePrenom }}</p>
        <p><strong>Courriel :</strong>{{ employe.employeCourriel }}</p>
        <p><strong>Poste :</strong>{{ employe.posteNom }}</p>
        <p><strong>Date d'embauche : </strong>{{ employe.employeDateEmbauche }}</p>
        <p><strong>École : </strong>{{ employe.ecoleNom }}</p>
        <p><a href="{{ path }}employe/edit/{{ employe.employeId }}">Une potion de polynectar!<img alt="Potion pour modifier l'apparence" src="{{ path }}img/potion.png"></img></a></p>
    </main>
</body>
</html>