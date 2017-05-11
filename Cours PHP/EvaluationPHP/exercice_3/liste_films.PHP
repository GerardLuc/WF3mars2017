<?php

$contenu = '';
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$query = $pdo->prepare('SELECT id_film, titre, realisateur, annee_de_production FROM moovies');
$query->execute();
$contenu .= '<h1>Liste des films</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>titre</th>
						<th>realisateur</th>
						<th>année</th>
						<th>plus d\'infos</th>
					</tr>';

while ($moovies = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $moovies['titre'] .'</td>
						<td>'. $moovies['realisateur'] .'</td>
						<td>'. $moovies['annee_de_production'] .'</td>
						<td>
							<a href="?id_film='. $moovies['id_film'] .'">Plus d\'infos</a>
						</td>
					</tr>';
	}			
			
$contenu .= '</table>';


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Liste des films</title>
	</head>
	<body>
		<?php echo $contenu; ?>
	</body>
</html>