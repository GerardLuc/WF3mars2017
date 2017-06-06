<?php

class Membre{
    public $id_membre;
    public $pseudo;
    public $email;
    
    public function inscription(){
        return 'Je m\'inscrit';
    }

    public function connexion(){
        return 'Je me connecte';        
    }
    
}

class ADMIN extends Membre{
    // Tout le code de membre est ici

    public function accesBackOffice(){
        return 'J\'ai acces au back office';        
    }
}

// -------------------------
$admin = new Admin;
echo $admin -> inscription().'<br>';
echo $admin -> connexion().'<br>';
echo $admin -> accesBackOffice().'<br>';

/*
Un admin esst avant tout un membre avec quelques fonctionalités supplémentaires, dont acces back office, suppression de membres, ect. 
Il est donc Naturel que la classe admin soit heritiere de la classe membre et qu'on ne réécrive pas tout le code.

*/ 