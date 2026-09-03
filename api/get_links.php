<?php
header("Content-Type: application/json");
require __DIR__ . '/config/db.php';


try{
    $stmt = $pdo->prepare('SELECT * FROM `links` ORDER BY `links`.`created_at` ASC');
    $stmt->execute();

    $links = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare('SELECT DISTINCT(category) FROM `links`');
    $stmt->execute();

    $categories = $stmt->fetchAll(PDO::FETCH_COLUMN);




    http_response_code(200);
    echo json_encode(
        [
            "status" => "success",
            "message" => "Database query succesfull",
            "links" => $links,
            "categories" => $categories
        ]);
}catch(PDOException $e){
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error"]);

}