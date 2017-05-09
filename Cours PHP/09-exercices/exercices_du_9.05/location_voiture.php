<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/

$categorie = array('A', 'B', 'C', 'D');
$message = '';
$afficheResultat = ''; // Variable d'affichage des messages d'erreur

// var_dump($_POST);

function prixLoc($categorie, $nbJours){
    switch($categorie) {
        case 'A' :$prix = 30; break;
        case 'B' :$prix = 50; break;
        case 'C' :$prix = 70; break;
        case 'D' :$prix = 90; break;
        default : return 'il y a un probleme sur le prix';
    }
    $prixLoc = $prix * $nbJours;

    if ($prixLoc > 150){
        $prixLoc = 0.9* $prixLoc;
    }
    return "La location de votre vehicule sera de $prixLoc euros pour $nbJours de location";
}


if(!empty($_POST)){

    // contrôle du formulaire
    $jour = (int)$_POST['nbJours']; // Ici on caste (= transforme ) le contenu $_POST['nbJours'] en integer, puis on verifie s'il est inferieur ou egal a 0 ligne suivante. Note: si $_POST['nbJours'] est une chaine, $jours prends toujours la valeur 0
    if ($jour <= 0) $message .= '<p>erreur sur le nombre de jours</p>';

    // on peut aussi utiliser la fonction prédéfinie ctype_digit() qui verifie si une chaine est un entier (retourne un boolean true ou false)
    if(!ctype_digit($_POST['nbJours']) || $_POST['nbJours'] <= 0) $message .= '<p>erreur sur le nombre de jours</p>';

    /* Synthese des types numeriques:
    is_numeric verifie si c'est un nombre, decimal ou pas

    is_int verifie si c'est un entier (me marche pas avec les formulaires : dans ce cas caster le type en integer pour le tester: cf ci-dessous)

    ctype_digit verifie si une chaine est un entier (utile dans le cas des formulaires)
    */

    if(!in_array($_POST['categorie'], $categorie)) $message .= '<p>Erreur sur la categorie</p>';
    // puis on verifie s'il n'y a pas d'erreur

    if(empty($message)){
        // on appelle la fonction prixLoc et on stoque son resultat dans une variable pour pouvoir l'afficher

        $afficheResultat = prixLoc($_POST['categorie'], $_POST['nbJours']);

    }
}

// ------- Affichage --------
echo $message;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Exercice</title>
    </head>
    <body>

    <h1>Selectionner une categorie de voiture</h1>
        <form method="post" action="">
        
            <label for="categorie">Categorie de voiture</label><br>

            <select name="categorie" id="categorie">
                <?php 
                foreach($categorie as $key => $value){
                    echo "<option value=$value>$value</option>";
                } 
                ?>
            </select><br><br>
            <label for="nbJours">Durée de la location (en jours)</label><br>
            <input type="text" name="nbJours" id="nbJours" placeholder="nombre de jours"><br><br>

            <button type="submit">Selectionner</button><br>
        </form>

        <?php  echo $afficheResultat; ?>
    </body>
</html>


<?php


