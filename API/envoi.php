<?php

/* Creation des donnees */
$data = array(
    'idArticles' => '123',
    'quantite' => '3',
    'token' => 'eyJhbGciOiJIUzI1NiJ9.eyJSb2xlIjoiQWRtaW4iLCJJc3N1ZXIiOiJJc3N1ZXIiLCJVc2VybmFtZSI6IkphdmFJblVzZSIsImV4cCI6MTYzMTE4ODEwNSwiaWF0IjoxNjMxMTg4MTA1fQ.8vZkI4qv8nr8pS5QR1RCbY96VcMP7RGbWFiowvGF3Pk'
);
/* Creation des options de contexte */
$options = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => "Content-Type: application/json",
        'content' => json_encode($data)
    ),
);

/* Creation du contexte HTTP */
$context  = stream_context_create($options);

/* Execution de la requete */
$reponse = file_get_contents('http://boutique-api/api/reception.php', false, $context);
echo $reponse;
