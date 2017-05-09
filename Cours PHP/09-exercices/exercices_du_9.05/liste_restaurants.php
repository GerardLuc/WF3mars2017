<?php

$contenu = '';
$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

query = $pdo->prepare('SELECT * FROM restaurant');
$query->execute();
$contenu .= '<h1>Liste des restaurants</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Téléphone</th>
						<th>Autres infos</th>
					</tr>';

while ($restaurants = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $restaurants['nom'] .'</td>
						<td>'. $restaurants['prenom'] .'</td>
						<td>'. $restaurants['telephone'] .'</td>
						<td>
							<a href="?id_restaurant='. $restaurants['id_restaurant'] .'">Plus d\'infos</a>
						</td>
					</tr>';
	}			
			
$contenu .= '</table>';



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Liste des restaurants</title>
</head>
<body>
	<?php echo $contenu; ?>
</body>
</html>