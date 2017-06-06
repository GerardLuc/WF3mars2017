<?php

function inclusion_automatique(){
    require($nom_de_la_classe.'.class.php');

    echo 'On passe dans l\'autoload <br>';
    echo 'On fait un require('.$nom_de_la_classe.'.class.php');
}

// -----------
spl_autoload_register('inclusion_automatique');
// -----------