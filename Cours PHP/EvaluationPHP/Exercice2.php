<?php 
/*
Exercice 2 : « On part en voyage »
Créer une fonction permettant de convertir un montant en euros vers un montant en dollars
américains.
Cette fonction prendra deux paramètres :
● Le montant de type int ou float
● La devise de sortie (uniquement EUR ou USD).
Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :
1 euro = 1.085965 dollars américains
Il faut effectuer les vérifications nécessaires afin de valider les paramètres.
*/




$afficheResultat = '';

$contenu = '';

// var_dump($_POST);

function convert($montant, $devise){
		
        $valeur = array(1.085965, 0.920839);
		
		if ($devise == 'USD') {
			$val = $valeur[0];
		} else {
			$val = $valeur[1];
		}	
		
			
		$convert = $montant * $val;

		if ($devise == 'USD') {
            return "Le montant converti est de $convert EUR";
		} else {
            return "Le montant converti est de $convert USD";
        }

		
}

// Validation du formulaire
if ($_POST) {

	if (!is_numeric($_POST['montant']) || $_POST['montant'] <= 0) $contenu .= '<p>Le montant doit être un nombre positif</p>';

	if ($_POST['devise'] != 'EUR' && $_POST['devise'] != 'USD') $contenu .= '<p>La devise n\'est pas correcte</p>';

	if (empty($contenu)) {
		$contenu = convert($_POST['montant'], $_POST['devise']);
	}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercice 2 "on part en voyage"</title>
</head>
    <body>

    	<h2>Exercice 2 : </h2>
        <h1>« On part en voyage »</h1>
        <form method="post" action="">
            <label for="montant">Montant a convertir</label><br>
			<input type="text" name="montant" id="montant"><br><br>

			<label>Convertir en:</label><br>
			<input type="radio" name="devise" value="EUR" id="EUR" checked><label for="EUR">EUR</label>
			<input type="radio" name="devise" value="USD" id="USD"><label for="USD">USD</label><br><br>
			
			<input type="submit" value="Calculer le montant">
        </form>

        <?php  echo $afficheResultat; ?>
        <?php  echo $contenu; ?>
    </body>
</html>