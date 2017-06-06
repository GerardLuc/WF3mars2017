<?php

namespace Controller;

use Controller\Controller;

class ProduitController extends Controller{
    public function afficheAll(){
        $produit = $this -> getRepository() -> getAllProduits();
        $categories = $this -> getRepository() -> getAllCategories();
    }

    public function affiche($id){
        $produit = $this -> getRepository() -> getProduitsById($id);
        $suggestion = $this -> getRepository() -> getAllSuggestions($produit['categorie'], $produit['id_produit']);  
        require('../view/Produit/categorie.php');
    }

    public function categorie($categorie){
        $produit = $this -> getRepository() -> getAllProduitsByCategorie($categorie);
        $categories = $this -> getRepository() -> getAllCategories();
        require('../view/Produit/categorie.php');
        
    }
}