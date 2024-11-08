<!DOCTYPE html>

<html>
    <!--  -->
    <head>
        <title>Cin3-iL - S'inscrire</title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Links -->
        <?php include "link.php"; ?>
        <script type="text/javascript" src="js/login.js"></script>

    </head>

    <body class="login_body">

        <!-- Include db -->
        <?php
            include 'includes/database.php';
            global $db;
        ?>

        <header>
            <nav>
                <a href="accueil.php">
                    <img src="img/favicon.png">
                </a>
            </nav>
        </header>

        <!-- DIV LOGIN -->
        <div class="div_login">
            <h1 style="color:black">S'inscrire</h1>
            <form class="form_login" method="post">
                <div>
                    <label for="login">Identifiant<sup>*</sup></label>
                    <input type="email" id="login" name="login" placeholder="abc@example.uk" required="True"/>
                </div>
                <div>
                    <label for="pseudo">Pseudo<sup>*</sup></label>
                    <input type="text" id="pseudo" name="pseudo" placeholder="Pseudonyme" required="True"/>
                </div>
                <div>
                    <label for="password">Mot de passe<sup>*</sup></label>
                    <input type="password" id="password" name="password" placeholder="*******" onfocusout="checkPassword()" required="True"/>
                </div>
                <div>
                    <label for="password2">Confirmation<sup>*</sup></label>
                    <input type="password" id="password2" name="password2" placeholder="*******" onfocusout="checkPassword()" required="True"/>
                </div>
                <button type="submit" id="sign_up" name="sign_up" class="login_submit">S'inscire</button>
            </form>
            <div>
                Déjà un compte ?<a href="sign_in.php">Se connnecter</a>
            </div>
        </div>

        <?php
            if (isset($_POST['sign_up']))
            {
                extract($_POST);
                if ($login && $pseudo && $password)
                {
                    $query = $db->prepare("INSERT INTO `user`(login, pseudo, password) VALUES (:login, :pseudo, :password)");
                    $query->execute([
                        'login' => $login,
                        'pseudo' => $pseudo,
                        'password' => $password,
                    ]);
                    unset($_POST);
                    header("Location: sign_in.php");
                }
            }
        ?>

    </body>

</html>
