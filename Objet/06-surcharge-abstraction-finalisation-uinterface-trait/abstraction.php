<?php

class Joueur{
    public function seConnecter(){
        return $this -> etreMajeur();
    }

    abstract public function etreMajeur(); // Une methode ,abstraite n'a pas de contenu
}

// -------
class JoueurFr extends Joueur{
    public function etreMajeur(){
        return 18;
    }
}

class JoueurUS extends Joueur{
    public function etreMajeur(){
        return 21;
    }
}

$fr new JoueurFr;
echo $fr -> seConnecter().'<br>';

$us new JoueurUs;
echo $us -> seConnecter().'<br>';

/*
    Une classe abstraite ne peut pas etre instanciée
    les methodes abstraintes n'ont pas de contenu
    pour declarer une methode abstraite on doit obligatoirement etre dans une classe abstraite
    une classe abstraite peut contenir des methodes normales
    lotsqu'on herite d'une classe abstraite on doit OBLIGATOIREMENt redefinir les methodes abstraites
*/ 