<?php
// Nous avons besoin d'un language interpreté coté serveur pour pouvoir communiquer
// $prenom = isset($_POST['prenom']) ? $_POST['prenom']: '';

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$id_employes ='';
if(isset($_POST['presonne'])){

}
$employes = $pdo->prepare('SELECT * FROM employes WHERE id_employes = $id_employes');

$information_employes = $employes->fetch(PDO::FETCH_ASSOC);

$tab = array();
$tab['resultat'] = '<table border='1'><tr>';
$tab['resultat'] .= '<th>'. implode('</th><th>', array_keys($information_employes)).'</th></tr>';
$tab['resultat'] .= '<tr>';

foreach($information_employes as $valeur){
    $tab['resultat'] .= '<td>'.$valeur.'</td>';
}

$tab['resultat'] .= '</tr>';
$tab['resultat'] .= '</table>';

echo json_encode($tab); // La réponse