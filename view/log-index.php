{{ include('header.php', { title: "#{ lang.log }", pageHeader: "#{ lang.log }" }) }}
<main>
    <table>
        <thead>
            <tr>
                <th>{{ lang.ip_id }}</th>
                <th>{{ lang.page_log }}</th>
                <th>{{ lang.date_log }}</th>
                <th>{{ lang.employee_log }}</th>
                <th>{{ lang.ip_log }}</th>
            </tr>
        </thead>
        <tbody>
                {% for log in logs %}
                <tr>
                    <td>{{ log.logId }}</td>
                    <td>{{ log.logPage }}</td>
                    <td>{{ log.logDate }}</td>
                    <td>{{ log.employeCourriel }}</td>
                    <td>{{ log.logAdresseIP }}</td>
                </tr>
                {% endfor %}
        </tbody>
    </table>
</main>
{{ include('footer.php') }}