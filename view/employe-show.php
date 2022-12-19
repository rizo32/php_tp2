{{ include('header.php', {title: "#{ lang.your_account }", pageHeader: "#{ lang.change_info } n.#{ employe.employeId } "}) }}

<main class="show">
    <p><strong>{{ lang.email }} : </strong>{{ employe.employeCourriel }}</p>
    <p><strong>{{ lang.employe_lastname }} : </strong>{{ employe.employeNom }}</p>
    <p><strong>{{ lang.employe_firstname }} : </strong>{{ employe.employePrenom }}</p>
    <p><strong>{{ lang.employe_job }} : </strong>{{ employe.posteNom }}</p>
    <p><strong>{{ lang.hiring_day }} : </strong>{{ employe.employeDateEmbauche }}</p>
    <p><strong>{{ lang.school }} : </strong>{{ employe.ecoleNom }}</p>
    <p><a href="{{ path }}employe/edit/{{ employe.employeId }}">{{ lang.polynectar_potion }}!<img alt="Potion pour modifier l'apparence" src="{{ path }}img/potion.png"></img></a></p>
</main>
{{ include('footer.php') }}