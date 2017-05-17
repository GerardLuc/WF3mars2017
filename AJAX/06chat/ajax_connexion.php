<?php
require_once("inc.init.inc.php");
$tab = array();
$tab['resultat'] = "";
$tab['pseudo'] = "disponible";

$erreur = false; // Variable de controle en fin de script. Si sa valeur est passée a true alors il y a une erreur (pseudo indisponible)


// extract ($_POST);
$mode = isset($_POST['mode']) ? $_POST['mode'] :'';


// Action= condition ? condition vrai (if) : condition fausse(else)
$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] :'';
$civilité = isset($_POST['civilité']) ? $_POST['civilité'] :'';
$ville = isset($_POST['ville']) ? $_POST['ville'] :'';
$date_de_naissance = isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] :'';

if($mode == "connexion"){
    // traitement de connexion/inscrption
    // requette pour tester si le pseudo est deja present dans la bdd
    $resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
    $membre = resultat->fetch("PDO::FETCH_ASSOC");
    if($ersultat->rowCount() == 0){ // S'il n'y a pas de ligne alors le pseudo est libre car inexistant en bdd
    $pdo->query("INSERT INTO membre (pseudo, civilité, ville, date_de_naissance, ip, date_connexion) VALUES ('$pseudo', '$civilité', '$ville', '$date_de_naissance', '$ip', '$date_connexion', '$_SERVER[REMOTE_ADDR]', $time )");
    }
}
echo json_encode($tab);