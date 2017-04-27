<h1>Page détail des articles</h1>

<?php
// ****************************
// La superglobale $_GET
// ****************************
// $_GET represente l'url: il s'agit d'une superglobale (un array). Disponible dans tous les contextes du script y compris dans les fonctions. In l'est pas nessessaire de faire global $_GET

// Les infos transitent dans 'lurl de la façon suivante:
// page.php?indice1=valeur1&indice2=valeur2 (sans espace)
// Chaque indice de cet url correspondent a un article de l'array $_GET, et chaque valeur correspond aux indices.


// print_r($_GET);

if (isset($_GET['article'])&& isset($_GET['couleur'])&& isset($_GET['prix'])){
    // Si existent les indices article, couleur et prix, on peut les afficher.
    echo 'Article: ' .$_GET['article'] . '<br>';
    echo 'Couleur: ' .$_GET['couleur'] . '<br>';
    echo 'Prix: ' .$_GET['prix'] . '<br>';
} else {
    echo 'aucun produit selectionné';
}