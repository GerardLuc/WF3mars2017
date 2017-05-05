<?php

/*
    1. Creer une fonction qui retourne la conversion d'une date fr en date us ou inversement. Cette fonction prends 2 parametres: une date (valide) et le format de conversion (us ou fr)

    2. Vous validez que le parametre de format est bien "us" ou "fr". La fonction retourne un message si ce n'est pas le cas?'
*/



function dateConvert($dateFormat){
    global $maVar;
    echo $maVar;
    // version avec objetdate
    // $objetDate = new DateTime($date);

    // if ($format == 'FR'){
    //     return $objetDate->format('d-m-Y') . '<br>';
    // } elseif ($format == 'US') {
    //     return $objetDate->format('Y-m-d') . '<br>';
    // } else 
    // return 'le format demandé n\'est pas correct';

    // autre version
    if($format == 'FR'){
        return strftime('%d-%m-%Y', strtotime($date)) . '<br>';
    } elseif ($format == 'US'){
        return strftime('%Y-%m-%d', strtotime($date)) . '<br>';
    } else {
        return 'le format demandé n\'est pas correct' . '<br>';
    }
}

echo dateConvert('02-05-2005','US');
echo dateConvert('2005-02-05','FR');


?>