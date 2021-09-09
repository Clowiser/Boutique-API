<?php
// Afficher les articles, en manière fonction, via la BDD
function afficheArticle($article){ // pour afficher les articles spécifiquement celui qui est sélectionné
    $bdd = new PDO('mysql:host=localhost;dbname=bddex;charset=utf8', 'JessiRig', 'evolPHP2+');
    $reponse = $bdd->query("SELECT * FROM articles WHERE idArticles='$article'"); // réquète sélectionne tout dans la table articles ou l'idArticles=$article

    while ($donnees = $reponse->fetch()){
        ?>
        <div class='contain'> <p> <?php echo $donnees['nomArticle']?></p>
            <?php echo "<img src=".$donnees['imgArticle']." width=200px>"; ?>
            <p> <?php echo $donnees['descArticle']?></p>
            <p> <?php echo $donnees['prixArticle']?> € </p> </div>
        <?php
    }
}

// Création du panier via la BDD
function affichePanier($panier){
    $bdd = new PDO('mysql:host=localhost;dbname=bddex;charset=utf8', 'JessiRig', 'evolPHP2+');
    $reponse = $bdd->query("SELECT * FROM articles WHERE idArticles='$panier'"); // réquète sélectionne tout dans la table articles ou l'idArticles=$panier

    while ($donnees = $reponse->fetch()){
        ?>
        <div class='contain'> <p> <?php echo $donnees['nomArticle']?></p>
            <?php echo "<img src=".$donnees['imgArticle']." width=200px>"; ?>
            <p> <?php echo $donnees['descArticle']?></p>
            <p> <?php echo $donnees['prixArticle']?> €  </p> </div>
        <?php
    }
}

// Total du panier quand on modifie la quantité | revoir la seconde partie pour la modification de la quantité
function totalPanier($id,$quantite) {
    $bdd = new PDO('mysql:host=localhost;dbname=bddex;charset=utf8', 'JessiRig', 'evolPHP2+');
    $reponse = $bdd->query("SELECT * FROM articles WHERE idArticles='$id'"); // réquète sélectionne tout dans la table articles ou l'idArticles=$article

    while ($donnees = $reponse->fetch()){
        ?>
        <div class="contain"> <?php $total=$quantite*$donnees['prixArticle'];
        echo'<form method="POST" action="index.php?page=panier.php">',
            '<input type="number" name="quantite" min="0" value="'.$quantite.'" >',
            '<input type="hidden" name="article" value="'.$id.'">',
            '<input type="hidden" name="prix" value="'.$donnees['prixArticle'].'">',
        '<input type="submit" name="modifQuantite" value="Modifier la quantité"> </form>','<p> Sous-total : '.$total.' € </p>','</div>';
    }
}?>

<?php
function totaltotal(){
    $bdd = new PDO('mysql:host=localhost;dbname=bddex;charset=utf8', 'JessiRig', 'evolPHP2+');
    $reponse = $bdd->query("SELECT * FROM articles");
    $montanttotal = 0; // cette var nous sert à calculer le montant total des articles
    while ($donnees = $reponse->fetch()){
        foreach ($_SESSION['panier'] as $k => $v) { // comment l'ancienne fonction, on parcout la table article via foreach (avec Sessions qui stocke les données indiv) avec var k associé à var v soit $key => $value ($k parcours et stock dans $v) soit $k => $v = id => 1 etc
            if($donnees['idArticles'] == $_SESSION['panier'][$k]['id']){ // si l'id de l'element du tableau est égal au donnees du tableau panier
                $total=$donnees['prixArticle']*$_SESSION['panier'][$k]['quantite']; // ce n'est plus l'element du tableau ($element['id'] ou $element['prix']) que l'on parcourt mais les données de la table via la connexion à la BDD
                $montanttotal=$total+$montanttotal; // nouveau montanttotal = total(donc )
            }
        }
    }
    echo "<div class='contain'><p>Le montant total de la commande est de : ".$montanttotal."€</p></div>";
}

function modifQuantite($id,$quantite,$ajout){ // fonction pour modifier la quantité de l'article avec les paramètres id et quantité que l'on va ajouter dans le panier
    $exist = false;
    if (!isset($_SESSION['panier'])){
        $_SESSION['panier'][] = ['id' => $_POST['article'], 'quantite' => $_POST['quantite']];
    }else{
        $modif = count($_SESSION['panier']); // variable modif (créée) est égal à la variable $-session du tableau panier - count : compte tous les élément du tableau panier
        for($i = 0; $i <$modif; $i++){ // $i = 0 (création de la var) ; $i < $modif (comptage des element du panier) ; $i ++ qui fait chaque ligne du panier (passe au suivant)
            if ($id == $_SESSION['panier'][$i]['id']){ // si var id est strictement égal au panier tableau, à l'index tableau et à l'id tableau alors ...
                if($ajout == true) $_SESSION['panier'][$i]['quantite'] = $quantite; // ... = $quantité
                if($ajout == false) $_SESSION['panier'][$i]['quantite'] += $quantite;
                $exist = true;
            }
        }
        if ($exist == false){
            $_SESSION['panier'][] = ['id' => $_POST['article'], 'quantite' => $_POST['quantite']];
        }
    }
}


function viderPanier($panier) { // variable pour vider le panier
    unset($_SESSION['panier']); // unset : supprime le panier
}


// API

function getHistoComm(){ // on créait une fonction que l'on nomme dans l'idée de l'objectif
    //PDO => extension définissant l'interface pour accéder à une BDD avec PHP - Orientée OBJET
    $bdd = new PDO('mysql:host=localhost;dbname=bddex;charset=utf8', 'JessiRig', 'evolPHP2+', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    // Gestion des erreurs : PDO::ATTR_ERRMODE : rapport d'erreurs => PDO::ERRMODE_EXCEPTION : qui émet une exception

    $reponse = $bdd->query("SELECT commandes.idCommandes, dateCommandes, idClient, nomArticle, SUM(articles.prixArticle) as PrixTtcArticles, SUM(articles.prixArticle)/1.20 as PrixHtArticles, SUM(quantite) as nombreArticles FROM commandes INNER JOIN commandes_articles ON commandes.idCommandes=commandes_articles.idCommandes INNER JOIN articles ON commandes_articles.idArticles=articles.idArticles GROUP BY idCommandes");
    
    // on créé la réponse = ou l'on va chercher la BDD et le langage SQL que l'on veut

    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC => affiche uniquement les données sous forme de prixarticles = 105 et non 0(index) = 105
    header('Content-Type: application/json'); // On renvoie du json 
    echo json_encode($donnees, JSON_PRETTY_PRINT); // fonction PHP pour mettre en tab
}

function getProducts()
{
    $bdd = new PDO('mysql:host=localhost;dbname=bddex;charset=utf8', 'JessiRig', 'evolPHP2+', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query("SELECT * FROM articles");
    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($donnees, JSON_PRETTY_PRINT);
}
function getProductsPS() ////PS = prix stock
{
    $bdd = new PDO('mysql:host=localhost;dbname=bddex;charset=utf8', 'JessiRig', 'evolPHP2+', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query("SELECT idArticles, prixArticle, quantiteDispo FROM articles");

    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($donnees, JSON_PRETTY_PRINT);
}

function getCat($cat)
{
    $bdd = new PDO('mysql:host=localhost;dbname=bddex;charset=utf8', 'JessiRig', 'evolPHP2+', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query("SELECT idArticles FROM articles WHERE categories = '$cat'");

    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($donnees, JSON_PRETTY_PRINT);
}
?>