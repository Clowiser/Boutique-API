<?php
$bdd = new PDO('mysql:host=localhost;dbname=bdds;charset=utf8', 'root', '');
    $reponse = $bdd->query('SELECT * FROM articles');

    while ($donnees = $reponse->fetch()){
?>
       <div class="contain"> <p> <?php echo $donnees['nomArticle']?></p>
        <?php echo '<a href ="index.php?page=article.php&article='.$donnees['idArticles'].'"> <img src='.$donnees['imgArticle'].' width=200px> </a>'; ?>
        <p>Prix unitaire : <?php echo $donnees['prixArticle']?> €</p>
        <?php
        echo'<form method="post" action="index.php?page=panier.php">',
        '<input type="number" name="quantite" min="0" value="1" >',
        '<input type="hidden" name="article" value="'.$donnees['idArticles'].'">',
        '<input type="hidden" name="prix" value="'.$donnees['prixArticle'].'">',
        '<input type="submit" name="ajoutPanier" value="Ajouter au panier">','</form>','</div>'; 
        ?>
<?php
    }
?>