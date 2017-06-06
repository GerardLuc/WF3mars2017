<?php

final class Application{// Creation d'une classe finale: signifiant qu'elle ne pourra pas etre heritée
    public function run(){
        return 'L\'appli se lance!'
    }
}

// ------
class Extension extends Application{} // Impossible, une classe finale ne peut aps etre heritée

$app = new Application; // Ok, une classe finale peut etre instanciée
$app -> run();

class Application2{
    final public function run2(){
        return 'L\'application se lance';
    }
}

class Extention2 Extends Application2{// OK, application2 n'est pas final donc on peut heriter
    public function run2(){ // ERREUR impossible de redefinir ni surcharger la methode finale

    }
}
