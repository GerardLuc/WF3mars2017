<?php

// ---------------------- Traitement ---------------------
require_once('inc/init.inc.php');
$inscription = false; // Variable qui permet de savoir si le membre est inscrit, pour le pas réafficher le formulaire d'inscription


// Traitement du post
if(!empty($_POST)){ // Si le formulaire est posté
    // Validation du formulaire
    if(strlen($_POST['pseudo']) < 4 || strlen ($_POST['pseudo']) >20){
        $contenu .= '<div class="bg-danger">Le pseudo doit contenir entre 4 et 20 caracteres</div>';
    }

    if(strlen($_POST['mdp']) < 4 || strlen ($_POST['mdp']) >20){
        $contenu .= '<div class="bg-danger">Le mot de passe doit contenir entre 4 et 20 caracteres</div>';
    }

    if(strlen($_POST['nom']) < 2 || strlen ($_POST['nom']) >20){
        $contenu .= '<div class="bg-danger">Le nom doit contenir entre 2 et 20 caracteres</div>';
    }

    if(strlen($_POST['prenom']) < 2 || strlen ($_POST['prenom']) >20){
        $contenu .= '<div class="bg-danger">Le prenom doit contenir entre 2 et 20 caracteres</div>';
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) >20){
        $contenu .= '<div class="bg-danger">L\'Email est invalide</div>';
    }
    // Filter_var() permet de valider des formats de chaines de caracteres pourverifier qu'il s'agit ici d'email (on pourrait valider une URL par exemple)

    if($_POST['civilité'] != 'm' && $_POST['civilité'] != 'f'){
        $contenu .= '<div class="bg-danger">La civilité est incorrecte</div>';
    }

    if(strlen($_POST['ville']) < 1 || strlen ($_POST['ville']) >30){
        $contenu .= '<div class="bg-danger">Le ville doit contenir entre 1 et 30 caracteres</div>';
    }

    // code postale
    if(!preg_match('#^[0-9]{5}$#', $_POST['code_postal'])){
        $contenu .= '<div class="bg-danger">Le code postal n\'est pas valide</div>';
        
    }

    if(strlen($_POST['adresse']) < 4 || strlen ($_POST['adresse']) >50){
        $contenu .= '<div class="bg-danger">L\' adresse doit contenir entre 4 et 50 caracteres</div>';
    }

    // Si aucune erreur n'est retenue c'est qu'il n'y a pas d'erreur
    if (empty($contenu)){ // Si $contenu est vide c'est qu'il n'y a pas d'erreur
    
        $membre = executeRequete("SELECT id_membre FROM membre WHERE pseudo = :pseudo", array(':pseudo'=> $_POST['pseudo']));
    
    if ($membre->rowCount() > 0){
        $contenu .= '<div class="bg-danger">Le pseudo est indisponible : veuillez en choisir un autre</div>';
    } else {
        // si le pseudo est unique, on peut faire l'inscription en bdd
        
        $_POST['mdp'] = md5($_POST['mdp']); // Permet d'encrypter le mdp selon l'algorythme md5. Il faudra le faire aussi sur la page de connexion pour comparer 2 mots cryptés

        executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0) ", array(':pseudo' => $_POST['pseudo'], ':mdp' => $_POST['mdp'], ':nom' => $_POST['nom'], ':prenom' => $_POST['prenom'], ':email' => $_POST['email'], ':civilite' => $_POST['civilité'], ':ville' => $_POST['ville'], ':code_postal' => $_POST['code_postal'], ':adresse' => $_POST['adresse']));

        $contenu .= '<div class="bg-danger">Vous etes inscrit. <a href="connexion.php">Cliquez ici pour vous connecter</a></div>';
        $inscription = true; // Pour ne plus afficher le formulaire d'inscription

        } // Fin du else ($membre->rowCount() > 0)
    } // Fin du if (!empty($contenu))
} // fin du if(!empty($_POST))




// ---------------------- AFFICHAGE ---------------------
require_once('inc/haut.inc.php');
echo $contenu; // Affiche les messages du site

if(!$inscription):  // Si membre non inscrit ($inscription va etre false), on affiche le formulaire
?>
<form action="" method="post">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" value=""><br><br>

    <label for="prenom">Prenom</label><br>
    <input type="text" id="prenom" name="prenom" value=""><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" value=""><br><br>

    <label for="email">Email</label><br>
    <input type="text" id="email" name="email" value=""><br><br>

    <label>civilité</label><br>
    <input type="radio" id="homme" name="civilité" value="m"><label for="homme">Homme</label>
    <input type="radio" id="femme" name="civilité" value="f"><label for="femme">Femme</label><br>
    
    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" value=""><br><br>

    <label for="code_postal">Code postal</label><br>
    <input type="text" id="code_postal" name="code_postal" value=""><br><br>

    <label for="adresse">Adresse</label><br>
    <input type="text" id="adresse" name="adresse" value=""><br><br>

    <input type="submit" name="inscription" value="s'inscrire" class="btn">


</form>


<?php
endif; // Syntaxe du if avec ";" qui remplace la premiere accolade et "endif" qui remplace la seconde
require_once('inc/bas.inc.php');
