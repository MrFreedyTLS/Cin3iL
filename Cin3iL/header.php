<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <nav>
        <div class="logo">
            <a href="accueil.php">
                <img src="img/favicon.png" alt="Logo">
            </a>
        </div>

        <!-- Menu classique -->
        <div class="nav-links">
            <div class="boutton_menu" onclick="window.location='accueil.php';">Accueil</div>
            <div class="boutton_menu" onclick="window.location='movies.php';">Films</div>
            <div class="boutton_menu" onclick="window.location='gallery.php';">Galeries</div>
            <div class="boutton_menu" onclick="window.location='infos.php';">Infos pratiques</div>
        </div>

        <!-- Menu burger pour mobile -->
        <div class="burger-menu" id="burger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Boutons de connexion/déconnexion -->
        <div class="button_login">
            <?php if (!isset($_SESSION['auth'])): ?>
                <div class="button_sign_in">
                    <a onclick="window.location='sign_in.php';">Se connecter</a>
                </div>
                <div>
                    <a class="button_sign_up" onclick="window.location='sign_up.php';">S'inscrire</a>
                </div>
            <?php else: ?>
                <div>
                    <a class="button_logout" onclick="window.location='logout.php';">Se déconnecter</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>
<script>
    document.getElementById('burger-menu').addEventListener('click', function() {
        var navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    });

</script>