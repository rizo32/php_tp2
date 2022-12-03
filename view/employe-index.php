{{ include('header.php', {title: 'Création employés'}) }}
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
{{ include('footer.php') }}