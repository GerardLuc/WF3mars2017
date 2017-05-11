<?php
// Exercice 1 : « On se présente ! »
// Créer un tableau en PHP contenant les infos suivantes :
// ● Prénom
// ● Nom
// ● Adresse
// ● Code Postal
// ● Ville
// ● Email
// ● Téléphone
// ● Date de naissance au format anglais (YYYY-MM-DD)
// A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML.
// La date sera affichée au format français (DD/MM/YYYY).
// Bonus :
// Gérer l’affichage de la date de naissance à l’aide de la classe DateTime


$contenu = '';

$infos = array('Prénom' => 'Luc', 'Nom' => 'Gerard', 'Adresse' => '69 rue du chemin vert', 'Code Postal' => 75011, 'Ville' => 'Paris', 'Email' => 'lucgerard10@gmail.com', 'Téléphone' => '0676533179', 'Date de naissance' => '1997-10-19');

echo '<h2>Exercice 1: </h2>';
echo '<h1>«On se présente ! »</h1>';


foreach($infos as $liste => $renseignements){
    if($liste == 'Date de naissance'){
        $date = new DateTime ($renseignements);
        echo '<p> '.$liste.': '.$date->format('Y-m-d').'</p>';


    } else {
        echo '<p> '.$liste.': '.$renseignements.'</p>';
    }
}

?>

