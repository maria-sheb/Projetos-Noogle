<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;

$secretKey = "FKQW4-Q1QMKA-DI7RP-MZ4Q1-WEPQ7-AOE16-12"; 

$payload = [
    "type" => "visitor",
    "iat" => time(),
    "exp" => time() + 36000
];

$jwt = JWT::encode($payload, $secretKey, 'HS256');

header('Content-Type: application/json');
echo json_encode(["token" => $jwt]);
?>