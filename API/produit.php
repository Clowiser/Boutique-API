<?php
require('../html/fonctions.php');

if (checkToken($_GET['token'])){
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