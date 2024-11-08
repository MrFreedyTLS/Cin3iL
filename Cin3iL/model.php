<?php
include 'includes/database.php';
global $db;

if (isset($_GET['model']) && $_GET['model'] == 'movie' && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $movieId = intval($_GET['id']);
    $stmt = $db->prepare("DELETE FROM `movie` WHERE movieId = :id");

    if ($stmt->execute(['id' => $movieId])) {
        echo "success";
    } else {
        echo "error";
    }
}
