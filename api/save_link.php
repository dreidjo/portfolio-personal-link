<?php
header("Content-Type:application/json");
require __DIR__ . '/config/db.php';

$input = file_get_contents('php://input');
$data = json_decode($input,true);


$linkTitle = trim($data["linkTitle"] ?? '');
$linkCategory = trim($data["linkCategory"] ?? '');
$linkUrl = trim($data["linkUrl"] ?? '');


if($linkTitle == '' || $linkCategory == '' || $linkUrl == ''){
    http_response_code(400);
    echo json_encode(["status" => "success", "message" => "Missing fields"]);
    exit();
}


try {
    $stmt = $pdo->prepare("INSERT INTO links(title,url,category) 
    VALUES (:title,:url,:category)");

    $stmt->bindValue(":title",$linkTitle);
    $stmt->bindValue(":url",$linkUrl);
    $stmt->bindValue(":category",$linkCategory);

    $success = $stmt->execute();

    if($success){
        http_response_code(200);
        echo json_encode([
        'status'  => 'success',
        'message' => 'Link added successfully!',
        'link_id' => $pdo->lastInsertId()
    ]);

    }else{
        http_response_code(500);
        echo json_encode([
        'status'  => 'error',
        'message' => 'Failed to process link. Please try again.'
    ]);

    }

} catch (PDOException $e) {
    http_response_code(404);
    echo json_encode(["status" => "error", "message" => "Error saving link"]);
}


