<?php
$donnees = "{
    'token' => '852EFG269DF',
    'nomArticle' => 'Torchons de l\'espace',
    'quantiteDispo' => 45,
}";


$url = "http://localhost/boutique-api/api/cmd.php";
$options = array(
  'http' => array(
    'method'  => 'post',
    'content' => json_encode($donnees),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" // Précise le type de données + l'encodage
    )
);


$context  = stream_context_create($options); // stream_context_create() - Crée un contexte de flux
$result = file_get_contents($url, false, $context); // Accès à un fichier HTTP avec les entêtes HTTP indiqués ci-dessus


// echo 'Last error : ', json_last_error_msg();
?>