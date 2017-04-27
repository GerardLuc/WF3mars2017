<?php

// Exercice
/*
    1. Realiser un formulaire permettant de selectionner un fruit dans un selecteur, et de saisir un poids quelconque exprimé en grammes.
    2. Faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué, en passant la la fonction calcul.
    3. Faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire apres que celui-ci soit validé.
*/

include('fonction.inc.php');
if (!empty($_POST)){
    echo calcul($_POST['fruits'], $_POST['poids']) .  '';
}

?>

<h1>Formulaire </h1>

<form method="post" action="">
   <select name="fruits" >
        <option value = "cerises" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'cerises') echo 'selected'; ?> >Cerises</option>
        <option value = "bananes" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'bananes') echo 'selected'; ?> >Bananes</option>
        <option value = "pommes" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'pommes') echo 'selected'; ?> >Pommes</option>
        <option value = "peches" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'peches') echo 'selected'; ?> >Peches</option>
   
   </select>
   <input type="text" name="poids" placeholder="poids en grammes" >

    <input type="submit" name="validation" value="calculer" > <br>

</form>