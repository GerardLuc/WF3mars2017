<?php

// ********************************** Fonctions membres **********************************

function internauteEstConnecte(){
    // Cette fonction indique si l'internaute est connecté:
    if(isset($_SESSION['membre'])){
        return true;
    } else {
        return false;
    }

    // on pourrait écrire:
    // return ($_SESSION['membre']); car isset retourne deja true ou false
}

// -------
function internauteEstConnecteEtEstAdmin() {
    // Cette fonction indique si le membre connecté est admin
    if (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
        return true;
    } else{
        return false;
    }
}

// --------------
function executeRequete($req, $param = array()){ // $param est un array vide par defaut. Il est donc optionnel.

    // htmlspecialchars:
    if(!empty($param)){
        // Si on a bien recu un array, on le traite
        foreach ($param as $indice => $valeur){
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }
    }

    // La requette préparée
    global $pdo; // $pdo est déclaré dans l'espace global (fichier init.inc.php). Il faut donc faire global $pdo pour l'utiliser dans un espace local de cette fonction'

    $r = $pdo->prepare($req);
    $succes = $r->execute($param); // On execute la requette en lui passant l'array $param qui permet d'associer cchaque marquer a sa valeur

    // Traitement erreurs SQL eventuelle:
    if(!$succes){ // Si $succes vaut false, il y a une erreur sur la requette
        die('erreur sur la requette SQL:' . $r->errorInfo()[2] ); // die arrete le script et affiche  un message. Ici on affiche un message d'erreur SQL donné par errorInfo(). Cette methode retourne un array dans lequel le message se situe a l'indice [2]
    }

    return $r; // Retourne un objet PDOStatement qui contient le resultat de la requete

}

// *************************************** Fonctions du panier **********************************************

function creationDuPanier(){
    if(!isset($_SESSION['panier'])){
        // S'il n'y a pas de panier dans session, on le crée
        $_SESSION['panier'] = array(); // Le panier est un array vide
        $_SESSION['panier']['titre'] = array();
        $_SESSION['panier']['id_produit'] = array();
        $_SESSION['panier']['quantite'] = array();
        $_SESSION['panier']['prix'] = array();
    }
}

function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix){ // Ces arguments sont en provenance du panier.php

    creationDuPanier(); // Pour creer la structure si elle n'existe pas

    $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); //array_search retourne un chiffre si l'id_produit est present dans l'array $_SESSION['panier'] qui correspond a l'indice auquel se situe l'element (rappel : dans un array le premier indice vaut 0). Sinon retourne FALSE

    if ($position_produit === false){
        // Si le produit n'est pas dans le panier, on l'y ajoute:
        $_SESSION['panier']['titre'][] = $titre; // Les crocheetes vides pour ajouter l'element a la fin de l'array
        $_SESSION['panier']['id_produit'][] = $id_produit;
        $_SESSION['panier']['quantite'][] = $quantite;
        $_SESSION['panier']['prix'][] = $prix;
    } else {
        // Si le produit existe on ajoute la qtt nouvelle a la qtt deja existante dans le panier
        $_SESSION['panier']['quantite'][$position_produit] += $quantite;
    }
}


// -----------
function montantTotal(){
    $total = 0; // Contient le nombre de commande

    for ($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
        // Tant que $i est inferieur au nombre de produits presents dans le panier, on additionne le prix fois la quantité:

        $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i]; // += pour ajouter la nouvelle valeur a l'ancienne sans l'ecraser
    }

    return round($total, 2); // On retourne le total arrondi a 2 decimales
}

// -----------------
function retirerProduitDuPanier($id_produit_a_supprimer) {
    // OOn cherche la position du produit dans le panier
    $position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']); // array_search renvoie la position du produit (integer) sinon false s'il n'y est pas


    if ($position_produit !== false){

        if ($_SESSION['panier']['quantite']['$position_produit'] > 1){
            $_SESSION['panier']['quantite']['$position_produit'] -= 1;
        } else {
            // si le produit est bien dans le panier, on coupe sa ligne
            array_splice($_SESSION['panier']['titre'], $position_produit, 1); // efface la portion du tableau à partir de l'indice indiqué par $position_produit et sur une ligne

            array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
            array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
            array_splice($_SESSION['panier']['prix'], $position_produit, 1);
        }
    }
}

// ---------------------
// EXERCICE
// ---------------------
// Creer une fonction qui retourne le nombre de produits differents dans le panier. Et afficher le resultat a coté du lien panier dans le menu de navigation. exemple: panier(3). Si le panier est vide, afficher panier(0)

function quantiteProduit(){
    if(isset($_SESSION['panier'])){
        // return count ($_SESSION['panier']['titre']);
        return array_sum($_SESSION['panier']['quantite']); // Array_sum additionne les valeurs situees a un incide
    } else {
        return 0;
        echo 'TOTO'; // Apres un return les instructions ne sont pas executes
    }
    

}
