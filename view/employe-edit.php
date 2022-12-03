{{ include('header.php', {title: 'Modification'}) }}

<main>
    <h2>Changez votre identité!</h2>
    <form action="{{ path }}employe/update" method="post">
        <input type="hidden" name="employeId" value={{ employe.employeId }}>
        <label>Nom 
            <input type="text" name="employeNom" value={{ employe.employeNom }}>
        </label>
        <label>Prénom
            <input type="text" name="employePrenom" value={{ employe.employePrenom }}>
        </label>
        <label>Votre poste
        <select name="employePosteId">
            <option value=1
            {% if employe.employePosteId == 1 %}
            selected
            {% endif %}>
            Directeur</option>
            <option value=2
            {% if employe.employePosteId == 2 %}
            selected
            {% endif %}>
            Professeur</option>
            <option value=3
            {% if employe.employePosteId == 3 %}
            selected
            {% endif %}>
            Aide-cuisinier</option>
        </select></label>
        <label>École
        <select name="employeEcoleId">
            <option value=1
            {% if employe.employeEcoleId == 1 %}
                selected
            {% endif %}>
            Hogwarts School of Witchcraft and Wizardry</option>
            <option value=2
            {% if employe.employeEcoleId == 2 %}
                selected
            {% endif %}>
            Beauxbatons Academy of Magic</option>
            <option value=3
            {% if employe.employeEcoleId == 3 %}
                selected
            {% endif %}>
            Castelobruxo</option>
            <option value=4
            {% if employe.employeEcoleId == 4 %}
                selected
            {% endif %}>
            Durmstrang Institute</option>
            <option value=5
            {% if employe.employeEcoleId == 5 %}
                selected
            {% endif %}>
            Ilvermorny</option>
            <option value=6
            {% if employe.employeEcoleId == 6 %}
                selected
            {% endif %}>
            Mahoutokoro School of Magic</option>
            <option value=7
            {% if employe.employeEcoleId == 7 %}
                selected
            {% endif %}>
            Uagadou School of Magic</option>
            <option value=8
            {% if employe.employeEcoleId == 8 %}
                selected
            {% endif %}>
            Koldovstoretz</option>
        </select></label>
        <label>Date d'embauche
            <input type="date" name="employeDateEmbauche" value="{{ employe.employeDateEmbauche }}">
        </label>
        <label>Courriel
            <input type="email" name="employeCourriel" value="{{ employe.employeCourriel }}">
        </label>
        <input type="submit" value="Obliviate!">
    </form>
    <form action="{{ path }}employe/delete" method="post">
        <input type="hidden" name="employeId" value="{{ employe.employeId }}">
        <input type="submit" value="Avada Kedavra!">
    </form>
</main>

{{ include('footer.php') }}