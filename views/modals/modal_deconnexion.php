<form action="../controllers/controller_connexion.php" method="post" class="display-none" id="modal-user">
    <img src="../image/cross-23.svg" alt="" class="cross" id="cross">
    <a href="view_profil.php">Modifier mon profil</a>
    <?php if(!empty($_SESSION['user']) && $_SESSION['user']['id_role'] == 2) { ?>
        <a href="../controllers/controller_admin.php">Admin</a>
    <?php } ?>
    <?php if( isset($_SESSION['user'])) { ?>
        <a href="../controllers/controller_deconnexion.php">Se déconnecter</a>
    <?php } ?>
</form>