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

<?php include "header.php"; ?>

<h1>Galerie photos:</h1>
<p style="text-align: center">Découvrez notre cinéma à travers ces différentes photos..</p>

<div id="gallery" class="gallery"></div>

<?php include "footer.php"; ?>

<script>
    function loadXML() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "img/photos.xml", true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const xml = xhr.responseXML;
                const photos = xml.getElementsByTagName('photo');

                for (let i = 0; i < photos.length; i++) {
                    const src = photos[i].getElementsByTagName('src')[0].textContent;
                    const title = photos[i].getElementsByTagName('title')[0].textContent;
                    const description = photos[i].getElementsByTagName('description')[0].textContent;

                    const galleryItem = document.createElement('div');
                    galleryItem.classList.add('gallery-item');
                    galleryItem.innerHTML = `
                        <img src="${src}" alt="${title}">
                        <div class="gallery-info">
                            <h3>${title}</h3>
                            <p>${description}</p>
                        </div>
                    `;

                    document.getElementById('gallery').appendChild(galleryItem);
                }
            } else {
                document.getElementById('gallery').innerHTML = "<p>Impossible de charger la galerie.</p>";
            }
        };

        xhr.onerror = function () {
            document.getElementById('gallery').innerHTML = "<p>Erreur de réseau. Impossible de charger la galerie.</p>";
        };

        xhr.send();
    }

    document.addEventListener('DOMContentLoaded', loadXML);
</script>

</body>
</html>
