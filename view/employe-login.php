{{ include('header.php', {title: "#{ lang.login }", pageHeader: "#{ lang.login }" }) }}

<main>
    <form action="{{ path }}employe/auth" method="post">
        <label>{{ lang.email }} 
            <input type="email" name="employeCourriel" value="{{ employe.employeCourriel }}" required>
        </label>
        <label>{{ lang.password }} 
            <input type="password" name="employeMotDePasse" required>
        </label>
        <input type="submit" value="{{ lang.Login }}">
    </form>
</main>

{{ include('footer.php') }}