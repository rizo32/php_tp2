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
        <a href="{{ path }}home/index">{{ lang.home }}</a>

        <a href="{{ path }}employe/index">{{ lang.employee_register }}</a>

        {% if(session.privilegeId == 1) or (session.privilegeId == 2) %}
        <a href="{{ path }}employe/create">{{ lang.hiring }}</a>
        {% endif %}

        {% if(session.privilegeId == 1) %}
        <a href="{{ path }}log/index">{{ lang.log }}</a>
        {% endif %}

        {% if guest %}
            <a href = "{{ path }}employe/login">{{ lang.Login }}</a>
        {% else %}
            <a href = "{{ path }}employe/logout">{{ lang.Logout }}</a>
        {% endif %}

        {% if cookie.lang == 'fr' %}
            <a href = "{{ path }}langue/en">EN</a>
        {% else %}
            <a href = "{{ path }}langue/fr">FR</a>
        {% endif %}
    </nav>
    <header>
        <h1>{{ pageHeader }}</h1>
        {% if guest %}
            <p>{{ lang.guest_greetings }}!</p>

        {% elseif(session.privilegeId == 1) %}
        <p>{{ lang.formal_greetings }} {{ session.employeNom }}</p>

        {% elseif(session.privilegeId == 2) %}
        <p>{{ lang.informal_greetings }} {{ session.employePrenom }}!</p>

        {% elseif(session.privilegeId == 3) %}
        <p>{{ lang.rude_greetings }} {{ session.employePrenom }}?</p>

        {% endif %}    
    </header>

    <aside>
        {% if errors is defined %}
            <span class="error">{{ errors | raw}}</span>
        {% endif %}
    </aside>