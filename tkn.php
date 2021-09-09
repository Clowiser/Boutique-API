<?php
require_once 'mdp.php';

$header = [

    'typ' => 'JWT',
    'alg' => 'HS256',
];

$payload = [

    'user_id' => 123,
    'roles' => [
        'ROLE_ADMIN',
        'ROLE_USER'
    ]
];


$b64Header = base64_encode(json_encode($header));
$b64Payload = base64_encode(json_encode($payload));

$b64Header = str_replace(['+','/','='], ['-','_',''],$b64Header);
$b64Payload = str_replace(['+','/','='], ['-','_',''],$b64Payload);


$secret = base64_encode(SECRET);
$signature = hash_hmac('sha256', $b64Header . '.'. $b64Payload, $secret, true );

$signature = str_replace(['+','/','='], ['-','_',''],base64_encode($signature));

// le token :

$tkn = $b64Header .'.'. $b64Payload .'.'. $signature;
echo $tkn;

?>