{{ include('header.php', {title: 'Création employés'}) }}

<main>
    <h2>Formulaire d'embauche</h2>
    <h3>Hogwarts School of Witchcraft and Wizardry</h3>
    {{ dateAujourdhui }}
    <form action="{{ path }}employe/store" method="post">
        <label>Nom 
            <input type="text" name="employeNom">
        </label>
        <label>Prénom
            <input type="text" name="employePrenom">
        </label>
        <label>Poste
        <select name="employePosteId">
            <option value=1>Admin</option>
            <option value=2>Professeur</option>
            <option value=3>Aide-cuisinier</option>
        </select></label>
        <label>Courriel
            <input type="email" name="employeCourriel">
        </label>
        <label>Mot de passe temporaire
            <!-- l'input est text et non pas password pour que Dumbledor puisse le noter et le remettre à l'employé afin que ce dernier le change -->
            <input type="text" name="employeMotDePasse" value="{{ employeMotDePasse }}">
        </label>
        <input type="hidden" name="employeEcoleId" value=1>
        <input type="submit" value="Wingardium Leviosa!">
    </form>
</main>

{{ include('footer.php') }}