<?php
    $host = 'localhost';
    $dbname = 'saep_db';
    $user = 'root';
    $password = '';

    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
