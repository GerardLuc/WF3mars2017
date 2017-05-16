<?php
// Nous avons besoin d'un language interpreté coté serveur pour pouvoir communiquer
// $prenom = isset($_POST['prenom']) ? $_POST['prenom']: '';
$prenom ='';

if(isset($_POST['prenom'])){
    $prenom = $_POST['prenom']; // On recupere l'argument fourni via post
}

$tab = array(); // On recupere le tableau array qui contiendra la reponse

$fichier = file_get_contents("fichier.json"); // On recupere le contenu du fichier.json
$json = json_decode($fichier, true); // On transforme en array representé par la variable json

foreach($json as $valeur){

    if($valeur['prenom'] == strtolower($prenom)){

        $tab['resultat'] = '<table border="1"><tr>';

        foreach($valeur as $information){

            $tab['resultat'] .= '<td>'. $information .'</td>';
        }
        $tab['resultat'] .= '</tr></table>';
    }
}

echo json_encode($tab); // La réponse