<?php

// Exercice:
/*
-Dans le ficheir listefruits.php: créer 3 liens bannane, kiwi et cerise.
Quand on clique sur ces liens on passe le nom du fruit dans l'url a la page couleur.php.

-Dans couleur.php: vous recuperez le nom du fruit et affichez sa couleur.

Notez que vous ne passez pas la couleur dans l'url mais vous la deduisez dans couleur.php.
*/



if (isset($_GET['fruit'])){
        echo 'fruit : ' . $_GET['fruit'] . '<br>';

        if ($_GET['fruit'] == 'banane'){
            echo 'Couleur : jaune <br>';
        }
        elseif ($_GET['fruit'] == 'kiwi'){
            echo 'Couleur : vert <br>';
        }
        elseif  ($_GET['fruit'] == 'cerise'){
            echo 'Couleur : rouge <br>';
        } else {
            'ce produit n\'existe pas';
        }
    } else {
        echo 'aucun produit selectionné';
}