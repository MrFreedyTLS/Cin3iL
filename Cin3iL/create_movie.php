<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Ajouter un film</title>
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
        ?>

        <section>
            <form method="post" class="form_create" enctype="multipart/form-data">
                <h1><u>Film</u></h1>
                <table>
                    <tr>
                        <td class="form_label">
                            <label for="name">Titre<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="text" id="name" name="name" placeholder="ex: Avengers endgame" onkeyup="upperWord('name')" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="image">Affiche<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="file" id="image" name="image" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="release_date">Date de sortie<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="date" id="release_date" name="release_date" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="movie_time">Durée du film<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="time" id="movie_time" name="movie_time" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="description">Description<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <textarea id="description" name="description" rows="10" placeholder="ex: Description..." required="True"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="showing">Film en projection</label>
                        </td>
                        <td class="form_input">
                            <input type="checkbox" id="showing" name="showing" value="true">
                            <label for="showing">Oui</label>
                        </td>
                    </tr>

                </table>
                <!-- Submit bouton -->
                <div>
                    <button type="submit" id="create_dvd" name="create_dvd">Créer</button>
                </div>

            </form>
        </section>

        <?php
        if (isset($_POST['create_dvd'])) {
            extract($_POST);
            if ($name && $_FILES["image"] && $description && $release_date && $movie_time) {
                $showing = isset($_POST['showing']) ? 1 : 0;

                $query = $db->prepare("INSERT INTO `movie`(name, image, description, release_date, movie_time, showing) VALUES (:name, :image, :description, :release_date, :movie_time, :showing)");
                $query->execute([
                    'name' => $name,
                    'image' => file_get_contents($_FILES["image"]["tmp_name"]),
                    'description' => $description,
                    'release_date' => $release_date,
                    'movie_time' => $movie_time,
                    'showing' => $showing
                ]);

                echo "<script>
            alert('Le film a été ajouté avec succès !');
            window.location.href = 'movies.php';
        </script>";

                unset($_POST);
            }
        }
        ?>


        <!-- Include footer -->
        <?php include "footer.php"; ?>
    </body>

</html>