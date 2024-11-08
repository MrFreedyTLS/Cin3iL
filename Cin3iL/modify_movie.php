<!DOCTYPE html>
<html>

<head>
    <title>Cin3-iL - Modifier un film</title>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <!-- Links -->
    <?php include "link.php"; ?>
    <script type="text/javascript" src="js/form.js"></script>
</head>

<body>
<!-- Include header -->
<?php
include "header.php";
include 'includes/database.php';
global $db;

if (isset($_GET['id'])) {
    $movieId = $_GET['id'];
    $query = $db->prepare("SELECT * FROM movie WHERE movieId = :id");
    $query->execute(['id' => $movieId]);
    $movie = $query->fetch(PDO::FETCH_ASSOC);

    if (!$movie) {
        echo "Film introuvable.";
        exit();
    }
} else {
    echo "Aucun film sélectionné.";
    exit();
}
?>

<section>
    <form method="post" class="form_create" enctype="multipart/form-data">
        <h1><u>Modifier le film</u></h1>
        <table>
            <tr>
                <td class="form_label">
                    <label for="name">Titre<sup>*</sup></label>
                </td>
                <td class="form_input">
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($movie['name']); ?>" required="True" />
                </td>
            </tr>

            <tr>
                <td class="form_label">
                    <label for="image">Affiche</label>
                </td>
                <td class="form_input">
                    <?php if (!empty($movie['image'])): ?>
                        <p>Image actuelle :</p>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($movie['image']); ?>" alt="Affiche du film" style="max-width: 200px; max-height: 300px;" />
                    <?php else: ?>
                        <p>Aucune affiche disponible</p>
                    <?php endif; ?>
                    <input type="file" id="image" name="image" />
                </td>
            </tr>


            <tr>
                <td class="form_label">
                    <label for="release_date">Date de sortie<sup>*</sup></label>
                </td>
                <td class="form_input">
                    <input type="date" id="release_date" name="release_date" value="<?php echo htmlspecialchars($movie['release_date']); ?>" required="True" />
                </td>
            </tr>

            <tr>
                <td class="form_label">
                    <label for="movie_time">Durée du film<sup>*</sup></label>
                </td>
                <td class="form_input">
                    <input type="time" id="movie_time" name="movie_time" value="<?php echo htmlspecialchars($movie['movie_time']); ?>" required="True" />
                </td>
            </tr>

            <tr>
                <td class="form_label">
                    <label for="description">Description<sup>*</sup></label>
                </td>
                <td class="form_input">
                    <textarea id="description" name="description" rows="10" required="True"><?php echo htmlspecialchars($movie['description']); ?></textarea>
                </td>
            </tr>

            <tr>
                <td class="form_label">
                    <label for="showing">Film en projection</label>
                </td>
                <td class="form_input">
                    <input type="checkbox" id="showing" name="showing" value="true" <?php echo $movie['showing'] ? 'checked' : ''; ?> />
                    <label for="showing">Oui</label>
                </td>
            </tr>

        </table>
        <!-- Submit bouton -->
        <div>
            <button type="submit" id="update_movie" name="update_movie">Mettre à jour</button>
        </div>

    </form>
</section>

<?php
if (isset($_POST['update_movie'])) {
    $name = $_POST['name'];
    $release_date = $_POST['release_date'];
    $movie_time = $_POST['movie_time'];
    $description = $_POST['description'];
    $showing = isset($_POST['showing']) ? 1 : 0;

    if ($_FILES['image']['tmp_name']) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $query = $db->prepare("UPDATE movie SET name = :name, image = :image, description = :description, release_date = :release_date, movie_time = :movie_time, showing = :showing WHERE movieId = :movieId");
        $query->execute([
            'name' => $name,
            'image' => $image,
            'description' => $description,
            'release_date' => $release_date,
            'movie_time' => $movie_time,
            'showing' => $showing,
            'movieId' => $movieId
        ]);
    } else {
        $query = $db->prepare("UPDATE movie SET name = :name, description = :description, release_date = :release_date, movie_time = :movie_time, showing = :showing WHERE movieId = :movieId");
        $query->execute([
            'name' => $name,
            'description' => $description,
            'release_date' => $release_date,
            'movie_time' => $movie_time,
            'showing' => $showing,
            'movieId' => $movieId
        ]);
    }

    echo "<script>alert('Le film a été mis à jour avec succès !');</script>";
}
?>

<!-- Include footer -->
<?php include "footer.php"; ?>
</body>

</html>
