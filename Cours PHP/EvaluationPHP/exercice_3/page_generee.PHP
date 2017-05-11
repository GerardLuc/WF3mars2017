<?php
if(isset($_GET['id_film'])){
    $query = $pdo->prepare('SELECT * FROM moovies WHERE id_film = :id_film');
    $query->bindParam(':id_film', $_GET['id_film'], PDO::PARAM_INT);
    $query->execute();

    $film = $query->fetch(PDO::FETCH_ASSOC);
    if (!empty($film)) {
        $contenu .= '<p>titre : '. $film['titre'] .'</p>';
		$contenu .= '<p>acteurs : '. $film['acteurs'] .'</p>';
		$contenu .= '<p>realisateur : '. $film['realisateur'] .'</p>';
		$contenu .= '<p>producteur : '. $film['producteur'] .'</p>';
		$contenu .= '<p>categorie : '. $film['categorie'] .'</p>';
		$contenu .= '<p>langue : '. $film['langue'] .'</p>';
		$contenu .= '<p>synopsis : '. $film['synopsis'] .'</p>';
		$contenu .= '<p>bande annonce : '. $film['bande_annonce'] .'</p>';

    }


} else {
    $contenu .= '<p>ce film n\'existe pas</p>';
}