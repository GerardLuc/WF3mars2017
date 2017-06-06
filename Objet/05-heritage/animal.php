<?php

class Animal{
    protected function deplacement(){
        return 'je me deplace';
    }

    public function manger(){
        return 'je mange';
    }
}

// --------------
class Elephant extends Animal{
    public function quiSuiJe(){
        return 'Je suis un elephant et '. $this -> deplacement();
        // Je peut appeler la methode deplacement() avec $this car en tant que methode protected elle est accessible das la classe déclarée ou les classes heritieres
    }
}

// --------------
class Chat extends Animal{
    public function quiSuiJe(){
        return 'Je suis un elephant et '. $this -> deplacement();
    }

    public function manger(){ // Redefinition de la classe manger uniquement pour les chats
        return 'Je mange peu !';
    }
}

// -------------
$eleph = new Elephant;
echo $eleph -> manger().'<br>';
echo $eleph -> quiSuiJe().'<br>';

$chat = new Chat;
echo $eleph -> manger().'<br>';
echo $eleph -> quiSuiJe().'<br>';

/*
    L'heritage est l'un des fondamentaux de la programation orientée objet.
    Lorque'une classe herite d'une autre classe, c'est comme si tout le code était importé. Les elements non private sont donc accessibles avec $this.

    Redefinition: une classe ebnfant peut modifier le comportement global d'une methode heritée.
    Surcharge: ubne classe enfant peut modifier en partie le comportement df'une methode heritée.

    L'interpreteur va d'abord regarder si une methode existe dans la classe quo l'execute et si il ne la trouve pas il va ensuite regarder dasn la classe mere
*/ 