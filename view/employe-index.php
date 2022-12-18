{{ include('header.php', {title: 'Index des employés', pageHeader: 'Voici votre équipe'}) }}
<main>
    <table>
        <thead>
            <tr>
                <th>Courriel</th>
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
                    <td>{{ employe.employeCourriel }}</td>
                    <td>{{ employe.employeNom }}</td>
                    <td>{{ employe.employePrenom }}</td>
                    <td>{{ employe.posteNom }}</td>
                    <td>{{ employe.employeDateEmbauche }}</td>
                    <td>{{ employe.ecoleNom }}</td>
                    {%  if session.privilegeId == 1 %}
                    <td><a href="{{ path }}employe/show/{{ employe.employeId }}">Modifier</a></td>
                    {% endif %}
                </tr>
                {% endfor %}
        </tbody>
    </table>
</main>
{{ include('footer.php') }}