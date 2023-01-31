<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités</title>
    <link rel="stylesheet" href="../style/style.css?v=<?=date("H-i-s")?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../image/favicon-512x512.png">
    <script src="../script/roulette.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/slider.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/user.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/redirectToGame.js?v=<?=date("H-i-s")?>" defer></script>

</head>

<body>
    <header>
        <nav class="nav">
            <a href="view_index.php" class="active">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="bottom-nav">
            <div class="line-1"></div>
            <img src="../image/Loupe.svg" class="glass">
            <input type="text" placeholder="Rechercher ici" class="search">
            <div class="user-div">
                <img src="../image/User.svg" alt="" class="user">
                <a href="view_inscription.php" class="create-profil"><button>S'inscrire ici</button></a>
            </div>
            <div id="overlay" class="login-modal-none"></div>
            <form action="../controllers/controller_connexion.php" method="post" class="display-none" id="modal-user">
                <img src="../image/cross-23.svg" alt="" class="cross" id="cross">
                <label for="login">Identifiant</label>
                <input type="text" id="login" name="form_email">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password" name="form_password">
                <input type="submit" name="form_connexion" value="Se connecter" id="button">
                <a href="view_inscription.php" class="create-profil-modal">S'inscrire ici</a>
            </form>
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
                    <h3 class="actu-title">Les news du jour</h3>           
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

    <footer class="foot">
    </footer>

</body>

</html>