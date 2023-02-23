<?php
    include_once '../models/connect.php';
    $req = $db->prepare('SELECT *
                        FROM jeux j  
                        LEFT JOIN avoir a ON a.id_jeux = j.id_jeux 
                        LEFT JOIN tag t ON t.id_tag = a.id_tag
                        LEFT JOIN plateforme p ON p.id_plateforme = a.id_plateforme
                        LEFT JOIN langue l ON l.id_langue = a.id_langue
                        LEFT JOIN attribuer ab ON ab.id_jeux = j.id_jeux
                        LEFT JOIN asset ass ON ass.id_asset = ab.id_asset
                        WHERE j.id_jeux=:id_jeux;'); //penser à faire un INNER JOIN
    $req->bindParam(":id_jeux", $_GET['id']);
    $req->execute();
    $jeux = $req->fetch(PDO::FETCH_ASSOC);    
    $title = "Actualités";
    $description = "Actualités des jeux indépendants.";
    require './topHTML.php';
?>


    <header>
        <nav class="nav">
            <a href="view_index.php" class="active">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <iconify-icon class="hamburger" icon="ci:hamburger" style="color: #fefafa;"></iconify-icon>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="display-none" id="smart-nav">
            <a href="view_index.php" class="active">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </div>
        <div class="bottom-nav">
            <div class="line-1"></div>
            <img src="../image/Loupe.svg" class="glass" alt="">
            <input type="text" placeholder="Rechercher ici" class="search">
            <div class="user-div">
                <img src="../image/avatar/<?=isset($_SESSION['user']) ? $_SESSION['user']['url_utilisateur'] : "User.svg"?>" alt="" class="user">
                <?=isset($_SESSION["user"]) ? '<p class="show-pseudo">'.$_SESSION["user"]["pseudo_utilisateur"].'</p>' : '<a href="view_inscription.php" class="create-profil"><button>Inscription</button></a>'?>
            </div>
            <div id="overlay" class="login-modal-none"></div>
            <?php
                if(isset($_SESSION['user'])) include 'modals/modal_deconnexion.php';
                else include 'modals/modal_connexion.php';
            ?>
            <div class="line-2"></div>
        </div>
    </header>

    <main>
        <div class="left-actu">
            <div class="gradient-container">
                <button class="but-roulette" id="but-roulette">Lance la roulette !</button>
                <div class="gradient"></div>
            </div>
            <div class="div-roul"> 
                <img src="../image/lights.svg" alt="" class="lights" id="lights" />
                <img src="../image/roulette.svg" alt="" class="roulette" id="roulette">
            </div>
            <div id="modal-roulette" class="display-none">
                <img src="../image/cross-23.svg" alt="" class="cross-roulette" id="cross-roulette">
                <h2>Lone Ruin</h2>
                <img src="../image/slide/loneRuin.jpg" alt="" class="modal-cover redirect">
                <a href="view_fiche de jeu.php">Voir la fiche du jeu</a>
                <button id="modal-roulette-button">Relancer la roulette</button>
            </div>
        </div>
        <div class="fil-actu">
            <h2 class="fil-title">Actualités</h2>
            <div class="inner-fil">
                <div class="fil-main">
                    <div class="actu-main"><h3 class="actu-title">Actu 0</h3>
                        <p id="actu-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ultricies maximus faucibus. Phasellus fringilla ligula at placerat interdum. Quisque laoreet faucibus lectus, vel convallis orci vulputate quis. Nulla id dui non velit ullamcorper suscipit nec ut quam. Sed eu aliquam tortor. Nam at sapien quis elit aliquam pretium. Ut lacinia nibh vitae erat fermentum dapibus. Suspendisse varius nunc a elit venenatis condimentum. Vestibulum ante ante, dictum sit amet fringilla at, tempor a nisl. Nullam semper, erat ac aliquam placerat, elit turpis consequat dolor, sit amet aliquet neque dolor eu ante. Donec vehicula est nec maximus volutpat. Integer consectetur, sem id rhoncus convallis, sem est semper urna, non suscipit tellus mauris luctus sapien. Praesent vehicula lacus at metus feugiat vehicula.

                            Nullam enim elit, posuere ac varius ut, mollis eget ante. Quisque cursus volutpat congue. Proin ut ante placerat, aliquam odio ut, condimentum augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam et commodo lacus. Praesent eleifend imperdiet dignissim. Vivamus massa lectus, tincidunt vel lorem euismod, pellentesque tempus eros. Nullam aliquet luctus augue vitae condimentum. Ut ante diam, hendrerit accumsan libero id, luctus varius felis.
                            
                            Aenean eget eros nulla. Pellentesque ac blandit sapien, non scelerisque risus. Nunc consectetur a sem et rhoncus. Duis ut ex mattis nulla eleifend congue sit amet non enim. Quisque non pretium eros, ac egestas ipsum. Maecenas id dapibus lacus. Suspendisse quis consectetur arcu. Nunc at ante consectetur metus pretium pulvinar. Morbi convallis vel nibh sed sollicitudin. Nam at auctor leo. Phasellus lacus est, egestas.
                        </p>
                        <p>Publiée le 12/01/2023 à <time id="actu-time">15h26</time></p>
                </div>             
                </div>
                
                <div class="fil-list">  
                    <h3 class="actu-title-list">Les news du jour</h3>
                    <div class="smart-list">
                        <h4><time>15h12 </time>Actu 1</h4>
                        <h4><time>14h54 </time>Actu 2</h4>
                        <h4><time>14h16 </time>Actu 3</h4>
                        <h4><time>13h02 </time>Actu 4</h4>
                        <h4><time>12h46 </time>Actu 5</h4>
                        <h4><time>12h12 </time>Actu 6</h4>
                        <h4><time>11h45 </time>Actu 7</h4>
                        <h4><time>11h32 </time>Actu 8</h4>
                        <h4><time>11h16 </time>Actu 9</h4>
                        <h4><time>10h22 </time>Actu 10</h4>
                    </div>       
                   
                </div>
            </div>
        </div>

        <div class="right-actu">
            <div class="head-slide">
                <div id="previous"><</div>
                <h2>Les prochaines sorties</h2>
                <div id="next">></div>
            </div>
            <div class="slider">
                <img src="../image/slide/loneRuin.jpg" alt="" id="pictures">
                <h2>Date</h2>
            </div>
        </div>
    </main>

<?php
    require './bottomHTML.php';
?>