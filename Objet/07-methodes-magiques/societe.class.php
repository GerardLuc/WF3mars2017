<?php

class Societe{
    public $adresse;
    public $ville;
    public $cp;

    public function __construct(){}

    public function __set($nom, $valeur){
        echo '<p style="color: white; background: red; padding: 5px;">Désolé, mais la propriété'.$nom.'n\'existe pas dans cette classe! donc la valeur <b>'.$valeur.'</b> n\'a pas pu etre affectée!</p>';
    }
}

/*
    __call(): appeler une methode qui n'existe pas
    __callstatic: appeller une methode static qui n'existe pas
    __isset(): condition isset/empty sure une propriété de mon objet
    __destruct(): s'execute quand le script est terminé (pour fermer une co a la bdd)
    __toString: se lance quand on essaie de faire un echo sur un objet
    __wakeup(), sleep(), __invoke(), __clone()...
*/ 