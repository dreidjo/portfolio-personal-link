<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=link_saver_db;charset=utf8mb4', 'link_saver_db', 'nvNUVkgG)!yT4VrV', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    // var_dump($e->getMessage());
    echo 'A problem occured with the database connection...';
    die();
}