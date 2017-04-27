<?php
// Exercice : créer le formulaire indiqué au tableau, récuperer les données saisies et les afficher dans la même page


print_r($_POST);

if(! empty($_POST)){
    echo 'ville: : ' . $_POST['ville'] . '<br>';
    echo 'code postal: : ' . $_POST['cp'] . '<br>';
    echo 'Description : ' . $_POST['adresse'] . '<br>';
}



?>

<h1>Formulaire 2</h1>

<form method="post" action="">
    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville" > <br>

    <label for="cp">code postal</label>
    <input type="text" id="cp" name="cp" > <br>

    <label for="adresse">Adresse</label>
    <textarea id="adresse" name="adresse" ></textarea> <br>
    
    <input type="submit" name="validation" value="Valider" > <br>

</form>