<?php
$reponse = json_decode(file_get_contents('php://input'), true);
print_r($reponse);

// $reponse = json_decode(file_get_contents("http://localhost/boutique-api/api/envoyer.php", true));
// $reponse = json_decode($result);
// echo $reponse;

// echo $data["operacion"];

// var_dump($result);

// $file = 'envoyer.php'; 
// // mettre le contenu du fichier dans une variable
// $data = file_get_contents($file); 
// // décoder le flux JSON
// $obj = json_decode($data); 
// // accéder à l'élément approprié
// echo $obj;

// require ('envoyer.php');
// $response = json_decode($result);
// echo $reponse;
?>