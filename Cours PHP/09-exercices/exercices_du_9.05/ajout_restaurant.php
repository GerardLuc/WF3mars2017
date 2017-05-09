<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	  id_restaurant PK AI INT(3)
	  nom VARCHAR(100)
	  adresse VARCHAR(255)
	  telephone VARCHAR(10)
	  type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	  note INT(1)
	  avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.
	
	3- Effectuer les vérifications nécessaires :
	   Le champ nom contient 2 caractères minimum
	   Le champ adresse ne doit pas être vide
	   Le téléphone doit contenir 10 chiffres
	   Le type doit être conforme à la liste des types de la bdd
	   La note est un nombre entre 0 et 5
	   L'avis ne doit être vide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/
$contenu = '';
$categorie = array('gastronomique', 'brasserie', 'pizzaria', 'autre');
$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// var_dump($_POST);

if(!empty($_POST)){  

	if (strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 100){
		$contenu .= '<p>Le nom doit comporter au moins 2 caractères</p>';
	}

	if (strlen($_POST['adresse']) < 0 || strlen($_POST['prenom']) > 255){
		$contenu .= '<p>L\'adresse doit etre remplie</p>';
	}

	if (!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
		$contenu .= '<p>Le téléphone doit comporter 10 chiffres</p>';
	}

	if (!in_array($_POST['categorie'], $categorie)){
		$contenu .= '<p>La categorie n\'est pas valide</p>';
	}
	
	if (!is_numeric($_POST['note']) || $_POST['note'] < 0 || $_POST['note'] >5){
		$contenu .= '<p>Donnez une note entre 0 et 5</p>';
	}

	if (strlen($_POST['avis']) < 0){
		$contenu .= '<p>Donnez votre avis!</p>';
	}


	if (empty($contenu)) {

		foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}


		$query = $pdo->prepare('INSERT INTO contact (nom, adresse, telephone, categorie, note, avis) VALUES(:nom, :adresse, :telephone, :categorie, :note, :avis)');
		$query->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$query->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
		$query->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
		$query->bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
		$query->bindParam(':note', $_POST['note'], PDO::PARAM_STR);
		$query->bindParam(':avis', $_POST['avis'], PDO::PARAM_STR);

		$succes = $query->execute();

		if ($succes) {
			$contenu .= '<p>Le restaurant a été enregistré avec succés<p>';
		} else {
			$contenu .= '<p>Erreur lors de l\'enregistrement<p>';
		}

	}

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>
	<body>
		<form action="" method="post">
			<input type="hidden" name="id_restaurant" id="id_restaurant">

			<label for="nom">Nom du restaurant</label><br>
			<input type="text" name="nom" id="nom"><br><br>

			<label for="adresse">adresse</label><br>
			<input type="text" name="adresse" id="adresse"><br><br>

			<label for="telephone">telephone</label><br>
			<input type="text" name="telephone" id="telephone"><br><br>

			<label for="categorie">categorie</label><br>
			<select name="" id="">
				<?php 
                foreach($categorie as $key => $value){
                    echo "<option value=$value>$value</option>";
                } 
                ?>
			</select><br><br>

			<label for="note">note</label><br>
			<select name="note">
				<?php for($i = 0; $i <= 5; $i++){
					echo '<option value="$i">$i</option>';
				} ?>
			</select><br><br>

			<label for="avis">avis</label><br>
			<input type="text" name="avis" id="avis"><br><br>
		</form>
	</body>
</html>