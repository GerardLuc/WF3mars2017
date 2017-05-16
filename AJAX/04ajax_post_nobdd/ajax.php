<?php

$email = "";
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

// creation ou ouverture d'un fichier via la fonction fopen
// en mode a php crée le fichier s'il n'existe pas sinon il ne fait que l'ouvrir

$f = fopen("email.txt", "a")
fwrite($f, $email, "\n") // \n permet le retour a la ligne dans un fichier. Il doit etre entre "" sinon il n'est pas interprété

$tab = array();
$tab['resultat'] = '<h2>Confirmation de l\'inscription</h2>';

$liste = file("email.txt"); // Place chaque ligne dans un array

$tab['resultat'] .= '<ul>';
foreach($liste as $valeur){
    $tab['resultat'] .= '<li>'. $valeur .'</li>';
}

$tab['resultat'] .= '</ul>';

echo json_encode($tab);