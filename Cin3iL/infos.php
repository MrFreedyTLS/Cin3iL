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

<!-- Include header -->
<?php
include "header.php";
include 'includes/database.php';
global $db;
?>

<div class="tarifs">
    <h2><u>Tarifs</u></h2>
    <ul >
        <li>
            <p><strong>Plein tarif</strong>: 10€</p>
        </li>
        <li>
            <p><strong>Tarif réduit</strong> (enfant à partir de 14ans, étudiant, chômeur): 7,50€</p>
        </li>
        <li>
            <p><strong>Tarif enfant</strong> - de 14ans et films de moins d'une heure: 4€</p>
        </li>
        <li>
            <p><strong>Tarif adhérent</strong>: 5,20€</p>
        </li>
        <li>
            <p><strong>Carte de 5 places</strong>: 33,50€, soit 6,70€ la place<br/>Les 5 places sont valables 1an. La carte est facturée 1€ sur le premier abonnement.<br/>Cette carte n'est pas nominative, vous pouvez l'utilisez à plusieurs.</p>
        </li>
        <li>
            <p><strong>Adhésive nominative</strong> (valable du 1er janvier au 31 décembre): 30€<br/>Cette carte donne droit au tarif adhérent à 5,20€.</p>
        </li>
    </ul> 
</div>

<div class="contact">
    <h2><u>Contacts</u></h2>
    <p>
        Tel/Fax: 05 XX XX XX XX<br/>

        Direction et programmation : Hervé X – <a href="contact@cin3il.com">contact@cin3il.com</a><br/>
        Responsable jeune public : Denis A – <a href="jeunepublic@cin3il.com">jeunepublic@cin3il.com</a><br/>
        Communication : Mathias E – <a href="communication@cin3il.com">communication@cin3il.com</a><br/><br/>
        Comptabilité : <a href="comptabilite@cin3il.com">comptabilite@cin3il.com</a><br/>
    
    </p>
</div>
<div class="plan">
    <h2><u>Où sommes nous ?</u></h2>
    <p>
        5 Rue de Bruxelles<br/>
        12000 RODEZ<br/>
    </p>
    <div id="map-container">
        <div id="map"></div>
    </div>
</div>



<!-- Fichiers Javascript -->
<script src="./js/map.js"></script>

<!-- Include footer -->
<?php include "footer.php"; ?>
</body>

</html>
