<?php

// Realiser un formulaire "pseudo" et "email" dans formulaire3.php en recuperant et affichant les données dans formulaire4

// De plus une fois le formulaire soumis, verifier que pseudo n'est pas vide. Si tel est le cas afficher un message d'erreuyr a l'internaute.


print_r($_POST);


?>

<h1>Formulaire 3</h1>

<form method="post" action="formulaire4.php">
    <label for="pseudo">pseudo</label>
    <input type="text" id="pseudo" name="pseudo" > <br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" > <br>
    
    <input type="submit" name="validation" value="Valider" > <br>

</form>