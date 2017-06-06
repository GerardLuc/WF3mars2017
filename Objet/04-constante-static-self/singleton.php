<?php

//04-constante-static-self
	//Singleton.php
	
//Design Pattern : Littéralement "Patron de conception", est une réponse donnée à un probléme que rencontre plusieurs (tous) développeurs. 

// Le singleton est la réponse à la question : Comment créer une classe qui ne sera instanciable qu'une seule et unique fois.

class Singleton 
{
	private static $instance = NULL;  
	
	private function __construct(){} // Fonction private donc notre classe n'est plus instanciable. 
	private function __clone(){} // Fonction private donc la classe n'est pas clonable. 
	
	
	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new Singleton; // je mets dans la propriété $instance un objet de la classe self/Singleton
			//self::$instance = new self; 
		}
		return self::$instance; 	
	}
}

//$singleton = new Singleton; // IMPOSSIBLE d'instancier notre classe.
$objet = Singleton::getInstance(); //$objet est le seul et unique objet de cette classe Singleton !!!  
$objet2 = Singleton::getInstance();

echo '<pre>';
var_dump($objet);
var_dump($objet2);
echo '</pre>';

// Le singleton est notamment utilisé pour la connexion à la base de données ! Cela est plus sér ! 




