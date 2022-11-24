<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rizo e2295331">
    <link rel="stylesheet" href="{{ path }}css/style.css"> 
    <title>Équipe</title>
</head>
<body>
    <nav>
        <a href="{{ path }}">Accueil</a>
        <a href="{{ path }}employe/index">Registre du personnel</a>
        <a href="{{ path }}employe/create">Hogwards embauche!</a>
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
                    {% for employe in employes %}
                    <tr>
                        <td>{{ employe.employeNom }}</td>
                        <td>{{ employe.employePrenom }}</td>
                        <td>{{ employe.posteNom }}</td>
                        <td>{{ employe.employeDateEmbauche }}</td>
                        <td>{{ employe.ecoleNom }}</td>
                        <td><a href="{{ path }}employe/show/{{ employe.employeId }}">Modifier</a></td>
                    </tr>
                    {% endfor %}
            </tbody>
        </table>
    </main>
</body>
</html>