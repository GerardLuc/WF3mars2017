<?php

interface Mouvement{
    public function start();
    public function turnRight();
    public function turnLeft();
}

class Bateau implements Mouvement{ // On utilise pas extend dans le cadre des interfaces
    public function start(); // Obligation de definir toute les methodes recuperees via l'implementation de l'interface
    public function turnRight();
    public function turnLeft();

}



class Avion implements Mouvement{
    public function start();
    public function turnRight();
    public function turnLeft();
}