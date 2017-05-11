<?php

$contenu = '';
$categorie = array('action', 'science-fiction', 'romantique', 'fantaisie', 'comedie', 'autre');
$langue = array('anglais', 'francais', 'allemand', 'espagnol', 'italien', 'autre');

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// var_dump($_POST);

if(!empty($_POST)){  

	if (strlen($_POST['titre']) < 4 || strlen($_POST['titre']) > 55){
		$contenu .= '<p>Le titre doit comporter au moins 5 caractères</p>';
	}

	if (strlen($_POST['acteurs']) < 4 || strlen($_POST['acteurs']) > 50){
		$contenu .= '<p>Le nom doit comporter au moins 5 caracteres</p>';
	}

	if (strlen($_POST['realisateur']) < 4 || strlen($_POST['realisateur']) > 50){
		$contenu .= '<p>Le nom doit comporter au moins 5 caracteres</p>';
	}

	if (strlen($_POST['producteur']) < 4 || strlen($_POST['producteur']) > 50){
		$contenu .= '<p>Le nom doit comporter au moins 5 caracteres</p>';
	}

	if (!(is_numeric($_POST['annee_de_production']) && checkdate('01', '01', $_POST['annee_de_production']))){
		$contenu .= '<div>L\'année de production n\'est pas valide</div>';
	}

	if (strlen($_POST['langue']) < 4 || strlen($_POST['langue']) > 50){
		$contenu .= '<p>La langue doit comporter au moins 5 caracteres</p>';
	}

	if (!in_array($_POST['categorie'], $categorie)){
		$contenu .= '<p>La categorie n\'est pas valide</p>';
	}

	if (strlen($_POST['synopsis']) < 4 || strlen($_POST['synopsis']) > 50){
		$contenu .= '<p>Le synopsis</p>';
	}
    
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['bande_annonce'])) {
        $contenu = 'L\'url n\'est pas valide'; 
    }



	if (empty($contenu)) {

		foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}


		$query = $pdo->prepare('INSERT INTO moovies (titre, acteurs, realisateur, producteur, annee_de_production, langue, categorie, synopsis, bande_annonce) VALUES(:titre, :acteurs, :realisateur, :producteur, :annee_de_production, :langue, :categorie, :synopsis, :bande_annonce)');
		$query->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
		$query->bindParam(':acteurs', $_POST['acteurs'], PDO::PARAM_STR);
		$query->bindParam(':realisateur', $_POST['realisateur'], PDO::PARAM_STR);
		$query->bindParam(':producteur', $_POST['producteur'], PDO::PARAM_STR);
		$query->bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
		$query->bindParam(':langue', $_POST['langue'], PDO::PARAM_STR);
		$query->bindParam(':annee_de_production', $_POST['annee_de_production'], PDO::PARAM_STR);
		$query->bindParam(':synopsis', $_POST['synopsis'], PDO::PARAM_STR);
		$query->bindParam(':bande_annonce', $_POST['bande_annonce'], PDO::PARAM_STR);

		$succes = $query->execute();

		if ($succes) {
			$contenu .= '<p>Le film a bien été enregistré<p>';
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
        <title>Exercice 3: « Et si on regardait un film ? »</title>
    </head>
    <body>
        <h2>Exercice 3:</h2>
        <h2>« Et si on regardait un film ? »</h2>

        <form action="" method="post">
            <input type="hidden" name="id_film" id="id_film">

            <label for="titre">Titre du film</label><br>
			<input type="text" name="titre" id="titre"><br><br>

            <label for="acteurs">nom des acteurs</label><br>
			<input type="text" name="acteurs" id="acteurs"><br><br>

            <label for="realisateur"> Nom du realisateur</label><br>
			<input type="text" name="realisateur" id="realisateur"><br><br>

            <label for="producteur">Nom du producteur</label><br>
			<input type="text" name="producteur" id="producteur"><br><br>

            <label for="annee_de_production">Année de realisation du film</label><br>
			<select name="annee_de_production" id="annee_de_production">
				<?php 
				for($i=date('Y'); $i>=date('Y')-100; $i--) {
					echo "<option value=$i>$i</option>";
				} 
				?>
			</select><br><br>

            <label for="langue">langue</label><br>
			<select name="langue" id="langue">
				<?php 
                foreach($langue as $key => $value){
                    echo "<option value=$value>$value</option>";
                } 
                ?>
            </select><br><br>

            <label for="categorie">categorie</label><br>
			<select name="categorie" id="categorie">
				<?php 
                foreach($categorie as $key => $value){
                    echo "<option value=$value>$value</option>";
                } 
                ?>
			</select><br><br>


            <label for="synopsis">Synopsis</label><br>
			<input type="text" name="synopsis" id="synopsis"><br><br>

            <label for="bande_annonce">Lien vers la bande-annonce du film</label><br>
			<input type="text" name="bande_annonce" id="bande_annonce"><br><br>

            <input type="submit" value="Envoyer">

        </form>
    </body>
</html>