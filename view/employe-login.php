{{ include('header.php', {title: 'Login'}) }}

<main>
    <h2>Connecter</h2>
    <span class="error">{{ errors|raw }}</span>
    <form action="{{ path }}employe/auth" method="post">
        <label>Courriel 
            <input type="email" name="username" value="{{ employe.employeCourriel }}">
        </label>
        <label>Mot de passe 
            <input type="password" name="password">
        </label>
        <input type="submit" value="Connecter">
        <label>Vous avez oublié votre mot de passe?
            <input type="submit" value="Oublie">
        </label>
    </form>
</main>

{{ include('footer.php') }}