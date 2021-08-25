<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" /> 
    <meta name="description" content="catalogue boutique">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<header> <!-- se mettra sur toutes les pages via le include header mis dans index -->
<div id="titre">
    <img class="etoile" src="img/etoile.png"><a href="index.php?page=index.php"><h1>La Boutique des Etoiles</h1></a><img class="etoile" src="img/etoilei.png">
</div> 
<!-- lien qui envoie le h1 sur la page index (index étant notre page principale) + Le point d'interrogation : différencie les pages et PHP comprend -->
    
    <nav class="nav_bar">
        <ol>
            <li class=""><a href="index.php?page=catalogue.php">Catalogue</a></li>
            <!--<li class=""><a href="#">A propos</a></li>-->
            <li class=""><a href="index.php?page=panier.php">Panier</a></li>
            <li class=""><a href="index.php?page=AddArticle.php">Ajoutez un article</a></li>
        </ol>
    </nav>
</header>
