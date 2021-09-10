<?php
require('../html/fonctions.php');

$access=false;

if(isset($_GET['token'])) {
    checkToken($_GET['token']);
}
if ($access){
    if(isset($_GET['cat'])){
        getCat($_GET['cat']);
    }
    elseif (isset($_GET['price'])) {
        getProductsPS();
    }
    elseif (isset($_GET['history'])){
        getHistoComm();
    }
    else {
        getProducts();
    }
}else{
    echo "Access denied";
}