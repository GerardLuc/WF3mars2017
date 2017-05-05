<?php

require_once('inc/init.inc.php');
// ---------------------------TRAITEMENT-----------------------------
// Si visiteur non connecté, on l'envoie vers connection
if (!internauteEstConnecte()){
    header('location:connexion.php'); // Nous l'invitons a se connecter
    exit();
} 

// echo '<pre>'; print_r($_SESSION); echo '</pre>';
if($_SESSION['membre']['statut'] == 1){
    $contenu .= '<p>Vous etes un admin</p>';
} else {
    $contenu .= '<p>Vous etes membre</p>';
}


$contenu .= '<h2>Bonjour '. $_SESSION['membre']['pseudo'] . '</h2>';

$contenu .= '<div><h3>Voici vos informations de profil</h3>';
    $contenu .= '<p>Votre email:'. $_SESSION['membre']['email'] . '</p>';
    $contenu .= '<p>Votre adresse:'. $_SESSION['membre']['adresse'] . '</p>';
    $contenu .= '<p>Votre code postal:'. $_SESSION['membre']['code_postal'] . '</p>';
    $contenu .= '<p>Votre ville:'. $_SESSION['membre']['ville'] . '</p>';
$contenu .= '</div>';

// Exercice
/*
    Afficher le suivi des commandes du membre s'il y en a dans une lise ul li :id_commande, date, etat de la commande. S'il n'y en a pas, afficher aucune commande en cours
*/
// requete

$id_membre = $_SESSION['membre']['id_membre'];

$requete executeRequete("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = '$id_membre'");

// S'il y a des commandes dans le resultat
if ($resultat->rowCount() > 0){
    $contenu .= '<ul>';
        while ($commande = $resultat->fetch(PDO::FETCH_ASSOC)){
            $contenu .= '<li> Votre commande n° '. $commande['id_commande'] .' du '. $commande['date_enregistrement'] .' est actuellement '. $etat['etat'] .' </li>'; 
        }
    $contenu .= '</ul>';
    

} else {
    // Pas de commande
    $contenu .= 'Aucune commaned en cours';
}


// ---------------------------AFFICHAGE-----------------------------
require_once('inc/haut.inc.php');


echo $contenu;
require_once('inc/bas.inc.php');