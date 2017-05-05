<?php
require_once('inc/init.inc.php');
// -------------------------- TRAITEMENT ----------------------

// 2. Ajouter un produit au panier
// echo '<pre>'; print_r($_POST); echo '</pre>';
if (isset($_POST['ajout_panier'])){
    // Siç no a cliqué sur ajouter au panier, alors on selectionne en base les infos du produit ajouté(en particulier le titre et le prix)
    $resultat = executeRequete("SELECT id_produit, titre, prix FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_POST['id_produit'])); // l'id du produit est donné par le formulaire d'ajout au panier
    
    $produit = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car un seul produit, on passe par l'id
    
    ajouterProduitDansPanier($produit['titre'], $_POST['id_produit'], $_POST['quantite'], $produit['prix']);

    // On redirige vers la fiche produit enn indiquant que le produit a été ajouté au panier:
    header('location:fiche_produit.php?statut_produit-ajoute&id_produit='. $_POST['id_produit']);
    exit();
}

// Affichage d'une fenetre modale pour confirmer l'ajout du produit au panier
if(isset($_GET['statut_produit']) && $_GET['statut produit'] == 'ajoute'){
    // On met dans une variable le HTML de la fenetre modale pour l'afficher ensuite:
    $contenu_gauche = '<div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Le produit a bien été ajouté au panier</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <a href="panier.php">Voire le panier</a>
                                            <a href="boutique.php">Continuer ses achats</a>
                                        </p>
                                    </div>
                                </div>
                            </div>    
                    </div>';
    }

// 3. Vider le panier
if(isset($_GET['action']) && $_GET['action'] == 'vider'){
    // Si il y a l'indice 'action' dans l'url et qu'il vaut 'vider'
    unset($_SESSION['panier']); // unset supprime un array ou une variable
}

// 4. Supprimer un article du panier
if (isset($_GET['action']) && $_GET['action'] = 'supprimer_article' && isset($_GET['articleASupprimer'])) {
    retirerProduitDuPanier($_GET['articleASupprimer']); // On passe a la fonction retirerProduitDuPanier l'id du produit a retirer
}









// 5. Validation du panier:
if(isset($_POST['valider'])){

    $id_membre = $_SESSION['membre']['id_membre'];
    $montant_total = montantTotal();

    // Le panier etant valiidé, on inscrit la commande en BDD:
    executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES (:id_membre, :montant, NOW())", array(':id_membre' => $id_membre, ':montant' => $montant_total));

    // On recupere l'id_commande de la commande inserée ci-dessus pour l'utiliser en clé etrangere dans la table details_commande:
    $id_commande = $pdo->lastInsertID();

    // mise a jour de  la table details_commande:
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
        // On parcourt le panier pour enregistrer chaque produit:
        $id_produit = $_SESSION['panier']['id_produit'][$i];
        $quantite = $_SESSION['panier']['quantite'][$i];
        $prix = $_SESSION['panier']['prix'][$i];

        executeRequete("INSERT INTO details_commande (id_commande, id_produit, quantite, prix) VALUES (:id_commande, :id_produit, :quantite, :prix)", array(':id_commande' => $id_commande, ':id_produit' => $id_produit, ':quantite' => $quantite, ':prix' => $prix));

        // Decrementation du stock du produit
        executeRequete("UPDATE produit SET stock = stock - :quantite WHERE id_produit = :id_produit", array(':quantite' => $quantite, ':id_produit' => $id_produit));
    }

    unset($_SESSION ['panier']); // On supprime le panier validé

$contenu .= '<div class="bg-success">Merci pour votre commande, le numero de suivi est le '. $id_commande .'</div>';
}



// -------------------------- AFFICHAGE ----------------------
require_once('inc/haut.inc.php');
echo $contenu;

echo '<h2>Voici votre panier</h2>';

if(empty($_SESSION['panier']['id_produit'])){
    // si panier vide
    echo '<p>Votre panier est vide</p>';
} else {
    echo '<table class="table">';
        echo '<tr class="info">
            <th>Titre</th>
            <th>N° du produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Action</th>
             </tr>';

        // On parcour l'array $_SESSION['panier'] pour afficher les produits qui s'y trouvent
        for ($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
            echo '<tr>';
                echo '<td>'. $_SESSION['panier']['titre'][$i] .'</td>';
                echo '<td>'. $_SESSION['panier']['id_produit'][$i] .'</td>';
                echo '<td>'. $_SESSION['panier']['quantite'][$i] .'</td>';
                echo '<td>'. $_SESSION['panier']['prix'][$i] .'</td>';
                echo '<td>
                        <a href="?action=supprimer_article&articleASupprimer='. $_SESSION['panier']['id_produit'][$i] .'">Supprimer article</a>
                      </td>';
            echo '</tr>';
        }

        echo '<tr class="info">
                <th colspan="3">Total</th>
                <th colspan="2">'. montantTotal() .' €</th> 
              </tr>'; // La formation utilisateur montantTotal() est déclaré dans fonction.inc.php et retourne le total du panier

            // Si le membre est connecté, on affiche le formulairede validation du panier
            if (internauteEstConnecte()) {
                echo '<form method="post" action="">
                    <tr class="text-center">
                        <td>
                            <input type="submit" name="valider" value="Valider le panier">
                        </td>
                    </tr>
                </form>';
            } else {
                // membre non connecté, on l'invite a s'inscrire et/ou se connecter
                echo '<tr class="text-center">
                    <td colspan="5">
                        Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> pour valider votre panier.
                    </td>
                </tr>';
            }

            echo '<tr class="text-center">
                    <td colspan="5">
                        <a href="?action=vider">Vider le panier</a>
                    </td>
                  </tr>';


    echo '</table>';
} // Fin du else


require_once('inc/bas.inc.php');