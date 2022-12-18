{{ include('header.php', { title: 'Création employés', pageHeader: 'Formulaire d\'embauche' }) }}

<main>
    <h3>Hogwarts School of Witchcraft and Wizardry</h3>
    {{ dateAujourdhui }}
    <form action="{{ path }}employe/store" method="post">
        <label>Nom 
            <input type="text" name="employeNom" value="{{ employe.employeNom }}">
        </label>
        <label>Prénom
            <input type="text" name="employePrenom" value="{{ employe.employePrenom }}">
        </label>

        <label>Poste
            <select name="employePosteId">
                <!-- <option value=1>Directeur</option> -->
                {%  if session.privilegeId == 1 %}
                <option value=2 {% if employe.employePosteId == 2 %} selected {% endif %}>Professeur</option>
                {% endif %}
            <option value=3 {% if employe.employePosteId == 3 %} selected {% endif %}>Aide-cuisinier</option>
        </select></label>


        <label>Courriel
            <input type="email" name="employeCourriel" value="{{ employe.employeCourriel }}">
        </label>
        <label>Mot de passe temporaire
            <!-- l'input est text et non pas password pour que Dumbledor puisse le noter et le remettre à l'employé afin que ce dernier le change -->
            <input type="password" name="employeMotDePasse" value="{{ employeMotDePasse }}">
        </label>
        <input type="hidden" name="employeEcoleId" value=1>
        <input type="submit" value="Wingardium Leviosa!">
    </form>
</main>

{{ include('footer.php') }}