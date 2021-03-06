<?php
require_once('inc/init.inc.php');
// ----------------------- TRAITEMENT ---------------------
$aside = '';

// 1. Controle de l'existence du produit demandé
if (isset($_GET['id_produit'])){  // Si existe l'indice id_produit dans l'url
    // On requete en base le produit demandé pour verifier son existence
    $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

    if($resultat->rowCOUNT() <= 0){
        header('location:boutique.php'); // Si il n'y a pas de resultat dans la requete c'est aue le produit n'existe pas. Ln oriente alors vers la bourique
    }

    // 2. Affichage du detail du produit
    $produit = $resultat->fetch(PDO::FETCH_ASSOC); // Pas de while car un seul produit

    $contenu .= '<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">'. $produit['titre'] .'</h1>
                    </div>
                </div>';

    $contenu .= '<div class="col-md-8">
                    <img src="'. $produit['photo'] .'" class="img-responsive">
                </div>';

    $contenu .= '<div class="col-md-4">
                    <h3>Description</h3>
                    <p>'. $produit['description'] .'</p>

                    <h3>details</h3>
                    <ul>
                        <li>Categorie '. $produit['categorie'] .'</li>
                        <li>Couleur '. $produit['couleur'] .'</li>
                        <li>Taille '. $produit['taille'] .'</li>                        
                    </ul>

                    <p class="lead">Prix : '. $produit['prix'] . ' € </p>
                </div>';


    // 3. Affichage du formulaire d'ajout au panier si stock > 0
    $contenu .= '<div class="col-md-4">';
        if($produit['stock']>0){
            // Si il y a du stock, on met le bouton d'jout au panier
            $contenu .= '<form action="panier.php" method="post" class="form-group-sm form-control-static">';
                $contenu .= '<input type="hidden" name="id_produit" value="'. $produit['id_produit'] .'" >';

            $contenu .= '<select name="quantite" name="id_produit" value"'. $produit['id_produit'] .'">';
                for($i = 1; $i <= $produit['stock'] && $i <= 5; $i++){
                    $contenu .= "<option>$i</option>";
                }
            $contenu .= '</select>';

            $contenu .= '<input type="submit" name="ajout_panier" value="Ajouter au panier" class="brn" style="margin-left:10px;">';

            $contenu .= '</form>';
        }

    $contenu .= '</div>';
    
} else {
    // si l'indice id_produit n'est pas dans l'url, 
    header('location:boutique.php');
    exit();
}

// -------------
// EXERCICE
// -------------
/*
    Vous allez creer des suggestions de produits: affichez 2 produits (photo et titre) aléatoirementappartenant a la même catégorie du produit affiché dans la page détail. Ces produits doivent être differents du produit affiché. La photo esst clicable et amene a la fiche produit.
    Utilisez la variable aside pour afficher le contenu
*/

$requete = executeRequete("SELECT id_produit, photo, titre FROM produit WHERE id_produit <> :id_produit AND categorie = :categorie ORDER BY RAND() LIMIT 2", array('id_produit' => $produit['id_produit'], 'categorie' => $produit['categorie']));

while ($affichage = $requete->fetch(PDO::FETCH_ASSOC)){
    $aside .= '<div class="col-sm-3">';
        $aside .= '<a href="fiche_produit.php?id_produit='. $affichage['id_produit'] .'">
            <img src="'. $affichage['photo'] .'" style="width:100%">
        </a>';
        $aside .= '<h4>'. $affichage['titre'] .'</h4>';
    $aside .= '</div>';
}




// ----------------------- AFFICHAGE ----------------------
require_once('inc/haut.inc.php');

echo $contenu_gauche; // recevra le pop up de confirmation d'ajour au panier
?>
    <div class="row">
        <?php echo $contenu; // Affiche le détail d'n produit ?>
    </div>

    <div class="row">
        <h3 class="page-header">Suggestion de produits</h3>
    </div>
    <?php echo $aside; // Affiche les produits suggeres ?>


<?php
require_once('inc/bas.inc.php');