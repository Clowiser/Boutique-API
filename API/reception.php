<?php
require '../html/fonctions.php';
// var_dump($_POST);
// echo "toto";
// $test = $_POST[0]['option'];
/* Reception du JSON */
$jsonData = file_get_contents("php://input");
echo $jsonData;