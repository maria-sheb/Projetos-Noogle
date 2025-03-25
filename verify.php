<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = "VERY-ULTRA-BLASTER-MEGA-SUPER-TOKEN!"; 

$headers = getallheaders();
if (!isset($headers['Authorization'])) {
    http_response_code(401);
    echo json_encode(["error" => "No token provided"]);
    exit;
}

$token = str_replace('Bearer ', '', $headers['Authorization']);

try {
    $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
    if ($decoded->type === "administrator") {
        echo json_encode(["access" => "granted"]);
    } else {
        echo json_encode(["error" => "Insufficient privileges"]);
        http_response_code(403);
    }
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid token"]);
}
?>
