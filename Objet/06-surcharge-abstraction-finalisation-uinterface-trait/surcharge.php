<?php

// Surcharge ou override: permet de modifier le comportement d'une methode heritée et d'y apporter des traitements supplementaires

Class A{
    public function calcul(){
        return 10;
    }
}

class B extends A{
    public function calcul(){
        // return $this -> calcul() +5; // Fonctionne pas car S'appelle soi-même
        // return A::calcul() +5 // Fonctionne pas car calcul() n'est pasz static

        return parent::calcul() +5; // On permet d'appeler le comportement de la meethode calcul() telle que definie dans la classe parente
    }
}