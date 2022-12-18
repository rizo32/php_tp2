<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rizo e2295331">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ path }}css/style.css">
</head>
<body>
    <nav>
        <a href="{{ path }}">Accueil</a>

        <a href="{{ path }}employe/index">Registre du personnel</a>

        {% if(session.privilegeId == 1) or (session.privilegeId == 2) %}
        <a href="{{ path }}employe/create">Embauche</a>
        {% endif %}

        {% if(session.privilegeId == 1) %}
        <a href="{{ path }}log/index">Journal de bord</a>
        {% endif %}

        {% if guest %}
            <a href = "{{ path }}employe/login">Login</a>
        {% else %}
            <a href = "{{ path }}employe/logout">Logout</a>
        {% endif %}
    </nav>
    <header>
        <h1>{{ pageHeader }}</h1>
        {% if guest %}
            <p>Bienvenue!</p>

        {% elseif(session.privilegeId == 1) %}
        <p>Bonjour Monsieur {{ session.employeNom }}</p>
        <p>privilege: {{ session.privilegeId }}</p>

        {% elseif(session.privilegeId == 2) %}
        <p>Salut {{ session.employePrenom }}!</p>
        <p>privilege: {{ session.privilegeId }}</p>

        {% elseif(session.privilegeId == 3) %}
        <p>Retournez vite travaillez, {{ session.employePrenom }}!!</p>
        <p>privilege: {{ session.privilegeId }}</p>

        {% endif %}    
    </header>

    <aside>
        <form action="{{ path }}log/store" method="post">
            <!-- <input type="hidden" name="logAdresseIP" value= "{{ session.logAdresseIP }}"> -->
            <!-- <input type="hidden" name="logDate" value= "{{ session.logDate }}"> -->
            <!-- {% if session.employeId %}
                <input type="hidden" name="logEmployeId" value= "{{ session.employeId }}">
            {% endif %}     -->
        </form>



        {% if errors is defined %}
            <span class="error">{{ errors | raw}}</span>
        {% endif %}
    </aside>