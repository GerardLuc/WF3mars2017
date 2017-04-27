<?php
// *****************************
// Les cookies
// *****************************
/* 

    Un cookie est un petit fichier (4 ko max) déposé par le serveur du site sur le poste de l'utilisateur, et qui peut contenir des informations sous forme de texte. Les cookies sont automatiquement renvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par le cookie.

    PHP peut tres facilement recuperer les données contenues dans un cookie: ses infos sont stockées dans la superglobale $_COOKIE.

    Precaution à prendre avec les ookies: un cookie étant sauvegardé sur le post de l'internaute, il peut etre volé ou détourné. On n'y stocke donc pas de données sensibles (mpd, n° CB...)

*/

// Application pratique: nous allons stocker la langue choisie par l'internaute dans un cookie

// 1: affectation de la langue à la variable $langue
if (isset($_GET['langue'])) { // Affecte une langue
    $langue = $_GET['langue'];
} elseif (isset($_COOKIE['langue'])){ // Si un cookie langue existe, il est utilisé comme langue par défaut
    $langue = $_COOKIE['langue'];
} else { // Language par defaut
    $langue = 'fr';
}

// 2: envoi du cookie avec la langue

$un_an = 365*24*60*60; // Un an exprimé en secondes

setCookie('langue', $langue, time() + $un_an); // setCookie('nom', 'valeur' + 'dateexpiration en timestamp') Créee et envoie un cookie vers le client


// 3: Affichage de la langue
echo 'Votre langue: ';
switch($langue) {
    echo $langue('Français');
    echo $langue('Italien');
    echo $langue('Anglais');
    echo $langue('Turque');
}


?>

<h1>Votre langue :</h1>

<ul>
    <li><a href="">Français</a></li>
    <li><a href="">Italien</a></li>
    <li><a href="">Anglais</a></li>
    <li><a href="">Turque</a></li>
</ul>