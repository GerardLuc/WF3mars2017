<?php

// Les traints ne fonctionnent que depuis php5.4
trait TPanier{
    public $nbProduit =1;

    public function affichageProduit(){
        return 'affichage des produits dans le panier';
    }
}

// -------
trait Tmembre{
    public function affichageMembre(){
        return 'affichagte des membres';
    }
}

class Site{
    use TPanier, TMembre; // Permet d'importer dle code dans un ou plusieur traits'
}

// -------
$site = new Site;
echo $site -> affichageProduit().'<br>';
echo $site -> affichageMembre().'<br>';