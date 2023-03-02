<?php

/* COMPRENDRE ÇA */
header('Access-Control-Allow-Origin: http://localhost:3000/');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
header("Content-Type: application/json");

$json = file_get_contents("php://input");

require_once __DIR__ . '/vendor/autoload.php';

use App\Entity\User;
use App\Route\Route;
use App\Manager\UserManager;
use App\Factory\PDOFactory;

/*
$username = $_POST["username"];
$password = $_POST["password"];
$userManager = new UserManager(new PDOFactory());
$newUser = new User();
$newUser->setUsername($username);
$newUser->setPassword(md5($password));
$userManager->insertUser($newUser);
*/

// Header
$header = [
    'typ' => 'JWT',
    'alg' => 'HS256'
];

// Payload = données qu'on stock dans le token
$payload = [
    'user_id' => 403,
    'roles' => [
        'BASIC_USER',
    ]
    ];

// Encodage base 65 
$base64Header = base64_encode(json_encode($header));
$base64Payload = base64_encode(json_encode($payload)); 


// On retire les + / = 
$base64Header = str_replace(['+','/','='],['-','_',''],$base64Header);
$base64Payload = str_replace(['+','/','='],['-','_',''],$base64Payload); 

// Clé 
const KEY = '7€TSN0TF1GHT1MT!R€D';
$secret_key = base64_encode(KEY);

// Génération de la signature
$signature = hash_hmac('sha256', $base64Header . '.' . $base64Payload, $secret_key, true);
$signature = str_replace(['+','/','='],['-','_',''], base64_encode($signature));

die;
