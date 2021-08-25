<?php
if(empty($_POST['nom'])){header('location:index.php?page=AddArticle.php&message=1');} // PAS DESPACE dans l'adresse xD SURTOUT PAS!!! sinon plantage du serveur
if(empty($_POST['image'])){header('location:index.php?page=AddArticle.php&message=2');}
if(empty($_POST['prix'])){header('location:index.php?page=AddArticle.php&message=3');}
if(empty($_POST['description'])){header('location:index.php?page=AddArticle.php&message=4');}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" /> 
    <meta name="description" content="article ajouté">
    <link rel="stylesheet" href="Css/style.css"/>
    <title>Votre article ajouté</title>
</head>
<body>

<div class="affiche">

<h2>Le nouvel article est :</h2>

<?php 
$recupNom = $_POST['nom'];
$recupImage = $_POST['image'];
$recupPrix = $_POST['prix'];
$recupDescription = $_POST['description']; ?>

<h3>Nom de l'article : <br></h3> <p><?php echo $_POST['nom']; ?></p>

<h3>Photo de l'article : <br></h3> <p><?php echo '<img class="img_affiche" src="'.$_POST["image"].'"/>' ?></p> <!--attention au '""'-->

<h3>Prix de l'article : <br></h3> <p><?php echo $_POST['prix']. " €"?></p>

<h3>Description de l'article :<br></h3> <?php echo $_POST['description']; ?></p>

<p>Pour rajouter un nouvel article, <a href="index.php?page=AddArticle.php">cliquez ici</a> afin de revenir à la page du formulaire.</p>

</div>