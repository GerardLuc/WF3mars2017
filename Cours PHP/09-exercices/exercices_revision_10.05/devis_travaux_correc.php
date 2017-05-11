<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/
$contenu ='';


function montantTTC($montant, $periode, $codeRemise){
		
		$taux = array(10, 20);
		$textRemise = '';
		
		if ($periode == 'sup') {
			$tva = $taux[0];   // soit 10
		} else {
			$tva = $taux[1];   // soit 20
		}	
		
			
		$montantTTC = $montant * (1 + $tva/100);

		if ($codeRemise == 'abc') {
			$montantTTC = 0.9 * $montantTTC;  // applique 10% de réduction
			$textRemise = ", et y compris une remise de 10%";
		}

		return "Le montant de vos travaux est de $montantTTC euros avec une TVA à $tva% incluse$textRemise.";
		
}


//-----------------
echo '<pre>'; var_dump($_POST); echo '</pre>';

if ($_POST) {

	if (!is_numeric($_POST['montant']) || $_POST['montant'] <= 0) $contenu .= '<div>Le montant doit être un nombre positif</div>';

	if ($_POST['periode'] != 'inf' && $_POST['periode'] != 'sup') $contenu .= '<div>Le choix de la période n\'est pas correct</div>';

	if (strlen($_POST['code']) > 5) $contenu .= '<div>Le code remise est incorrect</div>';  


	if (empty($contenu)) {
		$contenu = montantTTC($_POST['montant'], $_POST['periode'], $_POST['code']);
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Votre devis</title>
</head>
<body>

	<h1>Votre devis de travaux</h1>

	<?php  echo $contenu; ?>

	<form method="post" action="">
		
		<div class="input-group">
			<label for="montant">Montant de vos travaux</label>
			<input type="text" name="montant" id="montant">
		</div>
		<div class="input-group">
			<label>Période de construction de votre maison</label>
			<input type="radio" name="periode" value="sup" id="sup" checked><label for="sup">plus de 5 ans</label>
			<input type="radio" name="periode" value="inf" id="inf"><label for="inf">5 ans ou moins</label>
		</div>
		<div class="input-group">
			<label for="code">Indiquez le code remise</label>
			<input type="text" name="code" id="code">
		</div>
		<button type="submit">Envoyer</button>

	</form>


</body>
</html>