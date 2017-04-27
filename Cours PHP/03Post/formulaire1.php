<?php

// ****************************
// La superglobale $_POST
// ****************************
// $_POST est une superglobales, et donc un array dispo dans tous les contextes du script.

// C'est une methode qui permet de recupere les infos d'un formulaire.

// Un formulaire est forcement dans des balises form avec la designation des attributs methode (pour get ou post) et action (qui indique le fichier de destination de données du formulaire.)

// Les attributs name du formulaire consituent les indices de l'array $_POST de reception. Les données saisies dans les champs constituent les valeurs correspondantes.

// Il contient un bouton de type submit qui declenche l'envoi des données vers le serveur.

print_r($_POST);

if(! empty($_POST)){
    echo 'Prénom : ' . $_POST['prenom'] . '<br>';
    echo 'Description : ' . $_POST['description'] . '<br>';
}



?>

<h1>Formulaire 1</h1>

<form method="post" action="">
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" > <br>

    <label for="description">Description</label>
    <textarea id="description" name="description" ></textarea> <br>
    
    <input type="submit" name="validation" value="envoyer" > <br>

</form>