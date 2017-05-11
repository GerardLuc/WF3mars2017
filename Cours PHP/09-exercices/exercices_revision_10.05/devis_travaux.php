<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/

$taux = array('sup', 'inf');

$contenu = '';

$afficheResultat = '';

// var_dump($_POST);
function montantTTC($periode, $montantHT){
    switch($periode) {
        case 'sup' :$taux = 10; break;
        case 'inf' :$taux = 20; break;
        default : return 'il y a un probleme sur le montant HT';
    }
    $montantTTC = $montantHT * (1 + ($taux/100) );

    return "Le montant de vos travaux est de $montantTTC euros avec une TVA a $taux % incluse ";
}


// Validation du formulaire
if(!empty($_POST)){ // Si le formulaire est posté

    // on peut aussi utiliser la fonction prédéfinie ctype_digit() qui verifie si une chaine est un entier (retourne un boolean true ou false)
    if(!ctype_digit($_POST['montantHT']) || $_POST['montantHT'] <= 0) $contenu .= '<p>erreur sur le nombre de jours</p>';

       
    if($_POST['periode'] != 'sup' && $_POST['periode'] != 'inf'){
        $contenu .= '<p>La periode de construction est incorrecte</p>';
    }

    if(empty($contenu)){
        // on appelle la fonction et on stoque son resultat dans une variable pour pouvoir l'afficher

		$afficheResultat = montantTTC($_POST['periode'], $_POST['montantHT']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Exercices de revision</title>
	</head>
	<body>
		<form action="" method="post">
			<label for="montantHT">Montant hors-taxes</label><br>
			<input type="text" name="montantHT" id="montantHT"><br><br>

			<label for="periode">Periode de construction</label><br>
			<input type="radio" name="periode" id="plusDeCinqAns" value="sup" checked><label for="plusDeCinqAns">Il y a plus de 5 ans</label><br>
			<input type="radio" name="periode" id="moinsDeCinqAns" value="inf"><label for="moinsDeCinqAns">Il y a moins de 5 ans</label><br>	
			
			<input type="submit" value="Calculer le montant TTC">
		</form>

        <?php  echo $afficheResultat; ?>

	</body>
</html>