<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;

$secretKey = "VERY-ULTRA-BLASTER-MEGA-SUPER-TOKEN!"; 

$payload = [
    "type" => "visitor",
    "iat" => time(),
    "exp" => time() + 36000
];

$jwt = JWT::encode($payload, $secretKey, 'HS256');

header('Content-Type: application/json');
echo json_encode(["token" => $jwt]);
?>
