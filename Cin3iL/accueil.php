<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL</title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Links -->
        <link rel="icon" type="image/png" href="img/favicon.png">
        <?php include "link.php"; ?>

    </head>

    <body>

        <?php
            include "header.php";
            include 'includes/database.php';
            global $db;
            ?>

        <!-- script -->
        <h1>Cin3iL</h1>
        <p style="text-align: center">Bienvenue au cinéma Cin3iL, un cinéma éco-responsable proposé par l'école 3iL Rodez.</p>

        <h1><u>Actuellement au cinéma</u></h1>

        <?php
        $query = $db->query("SELECT name, image FROM `movie` WHERE showing = '1'");
        if ($query->rowCount() > 0) {
            echo '<div class="carousel">';
            echo '<i class="fas fa-angle-left" id="prev_Button"></i>';
            echo '<div class="images_carousel">';
            while ($movies = $query->fetch()) {
                echo '<img src="data:image/jpg;base64,' . base64_encode($movies['image']) . '" alt="' . $movies['name'] . '" title="' . $movies['name'] . '"/>';
            }
            echo '</div>';
            echo '<i class="fas fa-angle-right" id="next_Button"></i>';
            echo '</div>';
        } else {
            echo "<h1 style='color: white'>Aucun film à l'affiche en ce moment.</h1>";
        }
        ?>

        <script src="js/carousel.js"></script>

        <?php include "footer.php"; ?>
    </body>

</html>
