<?php

require_once('inc/init.inc.php');
require_once('inc/haut.inc.php');
// ---------------------------TRAITEMENT-----------------------------
// Si visiteur non connecté, on l'envoie vers connection
if (!internauteEstConnecte()){
    header('location:connexion.php'); // Nous l'invitons a se connecter
    exit();
} 

// echo '<pre>'; print_r($_SESSION); echo '</pre>';
if($_SESSION['membre']['statut'] == 1){
    $contenu /= '<p>Vous etes un admin</p>';
} else {
    $contenu .= '<p>Voues etes membre</p>'
}


$contenu .= '<h2>Bonjour '. $_SESSION['membre']['peseudo'] . '</h2>';

$contenu .= '<div><h3>Voici vos informations de profil</h3>';
    $contenu .= '<p>Votre email:'. $_SESSION['membre']['email'] . '</p>';
    $contenu .= '<p>Votre adresse:'. $_SESSION['membre']['adresse'] . '</p>';
    $contenu .= '<p>Votre code postal:'. $_SESSION['membre']['code_postal'] . '</p>';
    $contenu .= '<p>Votre ville:'. $_SESSION['membre']['ville'] . '</p>';
$contenu .= '</div>'

// ---------------------------AFFICHAGE-----------------------------

echo $contenu;
require_once('inc/bas.inc.php');