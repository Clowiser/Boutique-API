<div id="ajout"> <!--PLUS BESOIN D'UTILISER CETTE METHODE - on utilise les required dans la balise HTML-->
    <form method="post" name="formu" action="index.php?page=displayarticle.php">
    <h2>Ajoutez un nouvel article !</h2>

    <div class=champs>
        <label for="article"> Insérez le nom de l'article :</label><br>
        <?php
        if(isset($_GET['message'])){ // si (vérifier variable GET message existe ) par méthode GET
        if($_GET['message'] == 1){ // if variable est stricement égal à la partie 1
            echo 'Nom Requis'; //afficher le message | erreur : si on oublie un élément, seul le dernier message s'affiche
        }
        } 
        ?>
        <input type="text" name="nom" placeholder="ex : bouteille" autofocus>
    </div>

    <div class=champs>
        <label for="image"> Insérez la photo de l'article :</label> <br>
        <?php 
          if(isset($_GET['message'])){
            if($_GET['message'] == 2){
            echo 'URL Requis';
        }
    }
        ?>
        <input type="url" name="image" placeholder="ex : photo de l'article en URL">
    </div>

    <div class=champs>
        <label for="prix"> Insérez le prix de l'article :</label> <br>
        <?php 
          if(isset($_GET['message'])){
              if($_GET['message'] == 3){
            echo 'Prix Requis';
        }
    }
        ?>
        <input type="number" name="prix" placeholder="ex : prix chiffre en euros">
    </div>
    
    <div class=champs>
     <label for="description"> Insérez la description de l'article :</label> <br>
     <?php 
       if(isset($_GET['message'])){
           if($_GET['message'] == 4){
            echo 'Description Requis';
        }
    }
        ?>
        <textarea name="description" rows="10" cols="50" placeholder="ex : description de l'article"></textarea>   
    </div>

    <input type="submit" name="envoyer" value="Envoyer">
    </form>
</div>