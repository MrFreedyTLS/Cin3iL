<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Cin3-iL - Films</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <?php require_once ("link.php"); ?>
</head>

<body>
<?php
require_once("header.php");
require_once ("includes/database.php");
global $db;
?>

<section class="list_items">
    <?php
    $stmt = $db->prepare("SELECT movieId, name, image, description, movie_time, release_date FROM `movie`");
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        while ($movie = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <article class="item" id="movie-<?php echo $movie['movieId']; ?>">
                <img src="data:image/jpg;base64,<?php echo base64_encode($movie['image']); ?>" alt="<?php echo htmlspecialchars($movie['name']); ?>" title="<?php echo htmlspecialchars($movie['name']); ?>" class="item_image">
                <div class="item_description">
                    <h3><?php echo htmlspecialchars($movie['name']); ?></h3>
                    <p><strong>Durée :</strong> <?php echo htmlspecialchars($movie['movie_time']); ?> min</p>
                    <p><strong>Date de sortie :</strong> <?php echo htmlspecialchars($movie['release_date']); ?></p>
                    <p><strong>Description :</strong> <?php echo htmlspecialchars($movie['description']); ?></p>
                    <?php if (isset($_SESSION['auth'])): ?>
                        <div class="item_buttons">
                            <a id="update" href="modify_movie.php?id=<?php echo $movie['movieId']; ?>">Modifier</a>
                            <button id="delete" onclick="deleteItem(<?php echo $movie['movieId']; ?>);">Supprimer</button>
                        </div>
                    <?php endif; ?>
                </div>
            </article>
        <?php }
    } else {
        echo "<h1>Aucun film disponible pour le moment.</h1>";
    }
    ?>
</section>

<?php if (isset($_SESSION['auth'])): ?>
    <section>
        <a href="create_movie.php" class="create_line_link">
            <div class="create_line">
                <h2>Ajouter un film</h2>
            </div>
        </a>
    </section>
<?php endif; ?>

<script src="js/delete_movie.js"></script>
<?php include "footer.php"; ?>
</body>

</html>
