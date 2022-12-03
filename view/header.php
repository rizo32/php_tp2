<!DOCTYPE html>
<html lang="en">
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
        {% if guest %}
            <p>Enchanté!</p>
        {% else %}
            <p>Salut {{ session.employePrenom }}!</p>
        {% endif %}


        <a href="{{ path }}">Accueil</a>

        <a href="{{ path }}employe/index">Registre du personnel</a>
        {% if session.privilegeId == 1 %}
            <a href="{{ path }}employe/create">Embauche</a>
        {% endif %}
        {% if guest %}
            <a href = "{{ path }}employe/login">Login</a>
        {% else %}
            <a href = "{{ path }}employe/logout">Logout</a>
        {% endif %}
    </nav>
    <header>
       <h1>{{ pageHeader }}</h1>
    </header>

    <aside>
        {% if errors is defined %}
            <span class="error">{{ errors | raw}}</span>
        {% endif %}

    </aside>