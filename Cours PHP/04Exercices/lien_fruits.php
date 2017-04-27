<?php
/*
-Faire 4 liens HTML avec le nom des ffruits
-Quand on clique sur un lien, on affiche le prix pour 1000g de ce fruit, dans cette page lien_fruits.php
*/


include('fonction.inc.php');


// if (isset($_GET['fruit'])){
//         echo 'fruit : ' . $_GET['fruit'] . '<br>';

//         if ($_GET['fruit'] == 'cerise'){
//             echo 'prix pour 1000g : ' . calcul('cerise', 1000) . ' <br>';
//         }
//         elseif ($_GET['fruit'] == 'banane'){
//             echo 'prix pour 1000g : ' . calcul('banane', 1000) . ' <br>';
//         }
//         elseif ($_GET['fruit'] == 'pomme'){
//             echo 'prix pour 1000g : ' . calcul('pomme', 1000) . ' <br>';
//         }
//         elseif ($_GET['fruit'] == 'peche'){
//             echo 'prix pour 1000g : ' . calcul('peche', 1000) . ' <br>';
//         } else {
//             '<br> ce fruit n\'existe pas';
//         }
//     } else {
//         echo 'aucun fruit selectionné';
// }

if (isset($_GET['fruit'])){
    echo calcul($_GET['fruit'],1000);
}


?>

<br>
<a href="lien_fruits.php?fruit=cerise">cerise</a>
<br>
<a href="lien_fruits.php?fruit=banane">banane</a>
<br>
<a href="lien_fruits.php?fruit=pomme">pomme</a>
<br>
<a href="lien_fruits.php?fruit=peche">peche</a>