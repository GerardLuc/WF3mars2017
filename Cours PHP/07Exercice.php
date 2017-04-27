<?php
// Exercice
// Principe: créer un formulaire qui permet d'enregistrer un nouvel employé dans la base entrreprise.

/* Les etapes:
    1- Création du formulaire HTML
    2- Connexion a la bdd
    3- Lorsque le formulaire est posté, insertion des informations du formulaire en bdd. Faire avec une requete préparée.
    4- Aficher a la fin un message "l'employé a bien été ajouté"

*/
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


if(! empty($_POST)){ // Si le formulaire est soumis il y a des indices corresopondants au names
       

        // Controles du formulaire
        if(strlen($_POST['prenom']) < 3 ||  strlen($_POST['prenom']) > 20) $message .='<div>Le nnom doit comporter au moins 3 caracteres</div>'

        if(strlen($_POST['nom']) < 3 ||  strlen($_POST['nom']) > 20) $message .='<div>Le nom doit comporter au moins 3 caracteres</div>'
        
        if(strlen($_POST['sexe']) != 'm' ||  strlen($_POST['sexe']) != 'f') $message .='<div>Le sexe n\'est pas correct</div>'

        if(!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) $message .='<div>Le salaire doit etre superieur a 0</div>'


        $resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire) ");

        $resultat->bindParam(':prenom',  $_POST['prenom'], PDO::PARAM_STR);
        $resultat->bindParam(':nom',  $_POST['nom'], PDO::PARAM_STR);
        $resultat->bindParam(':sexe',  $_POST['sexe'], PDO::PARAM_STR);
        $resultat->bindParam(':service',  $_POST['service'], PDO::PARAM_STR);
        $resultat->bindParam(':date_embauche',  $_POST['date_embauche'], PDO::PARAM_STR);
        $resultat->bindParam(':salaire',  $_POST['salaire'], PDO::PARAM_INT);

        $req = $resultat->execute();

        if ($req) { // Execute ci-dessus renvoie soit un objet PDOStatement (Qui a une valeur implicite TRUE) si la requette a fonctionné, sinon il renvoie un boolean FALSE. Si$req contient un objet, il vaut true implicitement. On entre donc dans  la condition.
            echo 'l\'empoyé a bien été ajouté';

        } else {
            echo 'il y a eu une erreur lors de l\'enregistrement';
        }
    }


?>

<h1>Formulaire 1</h1>

<form method="post" action="">

    <label for="id_employes">id_employes</label> <br>
    <input type="text" id="id_employes" name="id_employes" > <br>

    <label for="prenom">Prenom</label> <br>
    <input type="text" id="prenom" name="prenom" > <br>

    <label for="nom">nom</label> <br>
    <input type="text" id="nom" name="nom" > <br>

    <label>sexe:</label>
    <input type="radio" id="male" name="sexe" value='m'> <label for="homme">Male</label>
    <input type="radio" id="female" name="sexe" value='f'> <label for="femme">Female</label>
    <br>

    <label for="date_embauche">date_embauche</label> <br>
    <input type="text" id="date_embauche" name="date_embauche" > <br>

    <label for="service">service</label> <br>
    <input type="text" id="service" name="service" > <br>
    
    <label for="salaire">salaire</label> <br>
    <input type="text" id="salaire" name="salaire" > <br>

    <input type="submit" name="validation" value="envoyer" > <br>

</form>
