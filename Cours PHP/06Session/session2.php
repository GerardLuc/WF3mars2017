<?php

// Création ou ouverture de la session :

session_start(); // Lorsque j'effectue i,e session_start(), la session n'est pas recrée car elle existe deja grace au session_start() lancé par le fichier session1.php

echo '<pre>'; print_r($_SESSION); echo '</pre>';

if (isset($_SESSION['temps']) && isset($_SESSION['limite'])){

    if (time() > ($_SESSION['temps'] + $_SESSION['limite'])){
        session_destroy();
        echo '<hr> Votre session a expiré, vous etes déconnécté <hr>';
    } else {
        $_SESSION['temps'] = time();
        echo '<hr>Connection mise a jour<hr>';
    }


} else { // On entre dans ce else la premiere fois pour remplir la session
    $_SESSION['temps'] = time(); // On remplit la session avec un indice temps qui contient le timestamp de l'instant présent
    $_SESSION['limite'] = 10; // On fixe la duree limite de session a 10 Sec
}