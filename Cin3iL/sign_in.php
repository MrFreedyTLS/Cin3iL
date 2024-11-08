<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Cin3-iL - Se connecter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <?php include "link.php"; ?>
</head>

<body class="login_body">
<?php
include 'includes/database.php';
session_start();
?>

<header>
    <nav>
        <a href="accueil.php">
            <img src="img/favicon.png" alt="Logo">
        </a>
    </nav>
</header>

<div class="div_login">
    <h1 style="color:black">Se connecter</h1>
    <form class="form_login" method="post">
        <div>
            <label for="login">Pseudonyme<sup>*</sup></label>
            <input id="login" name="login" placeholder="SuperNomDutilisateur" required />
        </div>
        <div>
            <label for="password">Mot de passe<sup>*</sup></label>
            <input type="password" id="password" name="password" placeholder="*******" required />
        </div>
        <button type="submit" id="sign_in" name="sign_in" class="login_submit">Se connecter</button>
    </form>
    <div>
        Pas de compte ? <a href="sign_up.php">Inscrivez-vous</a>
    </div>
</div>

<?php
if (isset($_POST['sign_in'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];

    if (!empty($login) && !empty($password)) {
        $query = $db->prepare("SELECT * FROM `user` WHERE pseudo = :login LIMIT 1");
        $query->execute(['login' => $login]);
        $user = $query->fetch();
        if ($user['password'] == $password) {
            session_start();
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = "Vous êtes maintenant connecté.";
            header('Location: accueil.php');
            exit();
        } else {
            $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect.";
        }
    }
}
?>
</body>

</html>
