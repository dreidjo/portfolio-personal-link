<?php

header("Content-Type: application/json");
require __DIR__ . '/config/db.php';

$input = file_get_contents('php://input');
$data = json_decode($input,true);

$linkId = $data["id"] ?? null;


if (!$linkId) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Link ID required"]);
    exit();
}

try{
    $stmt = $pdo->prepare("DELETE FROM `links` WHERE id = :id");
    $stmt->bindValue(":id",$linkId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Link deleted successfully"]);
    } else {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "Link not found or access denied"]);
    }

}catch(PDOException $e){
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error"]);

}

