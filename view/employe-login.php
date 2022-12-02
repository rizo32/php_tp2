<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rizo e2295331">
    <link rel="stylesheet" href="{{ path }}css/style.css"> 
    <title>Home</title>
</head>
<body>
    <nav>
        <a href="{{ path }}">Accueil</a>
        <a href="{{ path }}employe/index">Registre du personnel (emp)</a>
        <a href="{{ path }}employe/create">Embauche (dum)</a>
        <span class="filler"></span>
        <span class="filler"></span>
        <span class="filler"></span>
        <a href="{{ path }}employe/login">Se connecter</a>
        <!-- <a href="{{ path }}">Créer un compte</a> -->
    </nav>
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
</body>
</html>