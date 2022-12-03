{{ include('header.php', {title: 'Login'}) }}

<main>
    <form action="{{ path }}employe/auth" method="post">
        <label>Courriel 
            <input type="email" name="employeCourriel" value="{{ employe.employeCourriel }}">
        </label>
        <label>Mot de passe 
            <input type="password" name="employeMotDePasse">
        </label>
        <input type="submit" value="Connecter">
        <label>Vous avez oublié votre mot de passe?
            <input type="submit" value="Oublie">
        </label>
    </form>
</main>

{{ include('footer.php') }}