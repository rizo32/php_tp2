{{ include('header.php', { title: 'Journal de bord', pageHeader: 'Journal de bord' }) }}
<main>
    <table>
        <thead>
            <tr>
                <th>Site visité</th>
                <th>Date</th>
                <th>Employe</th>
                <th>Adresse IP</th>
                <th>Numero log</th>
            </tr>
        </thead>
        <tbody>
                {% for log in logs %}
                <tr>
                    <td>{{ log.logPage }}</td>
                    <td>{{ log.logDate }}</td>
                    <!-- à changer pour username -->
                    <td>{{ log.EmployeCourriel }}</td>
                    <td>{{ log.logAdresseIP }}</td>
                    <td>{{ log.logId }}</td>
                </tr>
                {% endfor %}
        </tbody>
    </table>
</main>
{{ include('footer.php') }}