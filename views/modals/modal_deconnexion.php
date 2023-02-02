<form action="../controllers/controller_connexion.php" method="post" class="display-none" id="modal-user">
    <img src="../image/cross-23.svg" alt="" class="cross" id="cross">
    <?php if( isset($_SESSION['user']) && $_SESSION['user'] !== null ) { ?>
        <a href="../controllers/controller_deconnexion.php">Se déconnecter</a>
    <?php } ?>
</form>