<form action="../controllers/controller_connexion.php" method="post" class="display-none" id="modal-user">
    <img src="../image/cross-23.svg" alt="" class="cross" id="cross" aria-label="fermer fenêtre de connexion">
    <label for="login">Identifiant</label>
    <input type="text" id="login" name="form_email" aria-label="tapez votre email ici">
    <label for="password" aria-label="tapez votre mot de passe ici">Mot de Passe</label>
    <input type="password" id="password" aria-label="tapez votre mot de passe ici" name="form_password">
    <input type="submit" name="form_connexion" value="Se connecter" id="button">
    <a href="view_inscription.php" class="create-profil-modal">S'inscrire ici</a>
</form>