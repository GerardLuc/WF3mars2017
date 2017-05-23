<?php

require_once('inc/init.inc.php');

// ------------------------------TRAITEMENT--------------------------
// 1. Affichage des categories de vetements
$categorie_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");

$contenu_gauche .= '<p class="lead">Salles</p>';
$contenu_gauche .= '<div class="list-group">';
    $contenu_gauche .= '<a href="?categorie-all" class="list-group-item" >Toutes les categories</a>';






//-------------------- AFFICHAGE ---------------------- 

require_once('inc/header.inc.php');
?>



<?php
    require_once('inc/footer.inc.php');
?>