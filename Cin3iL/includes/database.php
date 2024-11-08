<?php

define('HOST', 'mysql-cin3il.alwaysdata.net');
define('DB', 'cin3il_db');
define('USER', 'cin3il');
define('PASS', '123Cin3il!');

try {
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e;
}
?>