{{ include('header.php', {title: "#{ lang.employee_register }", pageHeader: "#{ lang.index_header }" }) }}
<main>
    <table>
        <thead>
            <tr>
                <th>{{ lang.email }}</th>
                <th>{{ lang.employe_lastname }}</th>
                <th>{{ lang.employe_firstname }}</th>
                <th>{{ lang.employe_job }}</th>
                <th>{{ lang.hiring_day }}</th>
                <th>{{ lang.school }}</th>
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
                    <td><a href="{{ path }}employe/show/{{ employe.employeId }}">{{ lang.edit }}</a></td>
                    {% endif %}
                </tr>
                {% endfor %}
        </tbody>
    </table>
</main>
{{ include('footer.php') }}