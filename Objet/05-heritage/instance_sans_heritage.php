<?php

class A{
    public function bonjour(){
        return 'Bonjour';
    }
}

class B extends C{ // B n'herite pas de A!
    public $maVariable -> bonjour();
}

class C{

}

// --------
$b = new B
echo $b -> maVariable -> bonjour();

// = $maVariable = new A; $maVariable -> bonjour(); $b -> maVariable -> bonjour

/*
    Nous avons un objet dans un objet d'ou l'utilisation de deux fleches successivement.

    L'interet d'avoir une instance sans heritage est de pouvoir heriter d'une classe mere d'un coté tout en ayant la possibilité de recuperer les elements d'une autre classe en même temps
*/ 