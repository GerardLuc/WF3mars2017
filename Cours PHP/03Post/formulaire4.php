<?php

print_r($_POST);

if(! empty($_POST)){ // Si le formulaire est soumis il y a des indices corresopondants au names
    if(! empty($_POST['pseudo']))
        echo 'pseudo : ' . $_POST['pseudo'] . '<br>';
    else {
        echo 'Erreur sur le pseudo';
    }
    echo 'email : ' . $_POST['email'] . '<br>';
}

?>

