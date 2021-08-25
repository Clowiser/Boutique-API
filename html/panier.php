<?php // le panier se fait via la session et non la BDD
// Session pour garder l'article sélectionné et en ajouter un autre puis un autre etc...
if(isset($_POST['ajoutPanier'])){ // is set = est réglé : est ce qu'elle est établie ? + ajoutPanier qui est le name de input de type submit (le bouton) repris du catalogue?
    modifQuantite($_POST['article'], $_POST['quantite'], false);
     // [] : créer nouvelle case car case vide + 'id' associe $_post de l'article du tableau depuis le catalogue et 'quantite' associe $_port de la quantite du tableau
}
if(isset($_POST['modifQuantite'])){ // vérirification et appel de ma fonction modifQuantite
    modifQuantite($_POST['article'], $_POST['quantite'], true); 
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['effacer']) and isset($_SESSION['panier']) ) {
    viderPanier($_SESSION['panier']);
}
if(!isset($_SESSION['panier'])){ // le point d'exclamation signifie inverse donc vérifie que ça ne n'existe pas
    echo '<div class="contain_center">' , '<h2>' , "Votre panier est vide" , '</h2>' , '</div>';
}else{
    foreach ($_SESSION['panier'] as $element){ // le panier se garde via la session de l'utilisateur et non la BDD !!
        affichePanier($element['id'], $element['quantite']);
        totalPanier($element['id'], $element['quantite']);
    }
    totaltotal();
    echo '<div class="contain"> <form action="index.php?page=panier.php" method="POST">
    <input type="submit" name="effacer" value="Effacer panier">
    </form> </div>';
}

// if(isset($_POST['quantite'])){ // si $_POSTquantité existe (isset) et différente de nulle (elle existe quand on ajoute un article au panier de la page catalogue à panier)
//     affichePanier($_POST['article']); // affiche fonction affichePanier (qui permet d'afficher l'article sélectionner les différents articles)
//     totalPanier(); // affiche fonction total Panier (si on modifie la quantité et calcul auto le total)
// }else{
// } ancienne façon avant session pour Affiche Panier et le total panier

?>
<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" /> 
    <meta name="description" content="articles">
    <link rel="stylesheet" href="Css/style.css" />
    <title>Panier</title>
</head>
<body> -->


<div class="contain">
<p><a href="index.php?page=catalogue.php">Cliquez ici</a> afin de revenir à la page du catalogue.</p> 
</div>


<!-- </body>
</html> -->