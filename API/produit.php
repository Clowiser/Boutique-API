<?php
  // Se connecter à la base de données
require('../html/fonctions.php');
if(isset($_GET['cat'])){
    getCat($_GET['cat']);
}
