<fieldset>
        <legend>Ajout</legend>
        <form method="post">
            <input type="hidden" name="form_insert" value="1">
            <label>Nom:
                <input type="text" name="nom_utilisateur">
            </label>
            <br/>
            <label>Prénom:
                <input type="text" name="prenom_utilisateur">
            </label>
            <br/>
            <label>E-mail:
                <input type="email" name="mail_utilisateur">
            </label>
            <br/>
            <label>Pseudo:
                <input type="text" name="pseudo_utilisateur">
            </label>
            <br/>
            <label>Mot de passe:
                <input type="password" name="password__utilisateur">
            </label>
            <br/>
            <label>Image:
                <input type="text" name="url_utilisateur">
            </label>
            <br/>
            <label>Date de naissance:
                <input type="date" name="naissance_utilisateur">
            </label>
            <br/>
            <input type="submit" value="Enregistrer">
        </form>
    </fieldset>