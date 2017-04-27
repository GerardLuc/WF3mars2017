<?php
// Exercice
// Principe: créer un formulaire qui permet d'enregistrer un nouvel employé dans la base entrreprise.

/* Les etapes:
    1- Création du formulaire HTML
    2- Connexion a la bdd
    3- Lorsque le formulaire est posté, insertion des informations du formulaire en bdd. Faire avec une requete préparée.
    4- Aficher a la fin un message "l'employé a bien été ajouté"

*/

$message = '';
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


if(! empty($_POST)){ // Si le formulaire est soumis il y a des indices corresopondants au names
       
        // Controles du formulaire
        if(strlen($_POST['prenom']) < 3 ||  strlen($_POST['prenom']) > 20) $message .='<div>Le prenom doit comporter au moins 3 caracteres</div>';

        if(strlen($_POST['nom']) < 3 ||  strlen($_POST['nom']) > 20) $message .='<div>Le nom doit comporter au moins 3 caracteres</div>';
        
        if($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f') $message .='<div>Le sexe n\'est pas correct</div>';

        if(strlen($_POST['service']) < 3 ||  strlen($_POST['service']) > 20) $message .='<div>Le service doit comporter au moins 3 caracteres</div>';

        if(!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) $message .='<div>Le salaire doit etre superieur a 0</div>'; // is_numerique() teste si c'est un nombre'

        $tab_date = explode('-', $_POST['date_embauche']); // Met le jour le mois et l'annee dans un array pour pouvoir les passer a la fonction checkdate ($mois, $jour, $annee)
        if(! (isset($tab_date[0]) && isset($tab_date[1]) && isset($tab_date[2]) && checkdate($tab_date[1], $tab_date[2], $tab_date[0]) ) ) $message .='<div>La date n\'est pas valide</div>'; // checkdate ($mois, $jour, $annee)

            if (empty($message)){ // Si les messages sont vides c'est qu'il n'y a aps d'erreur

                $resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire) ");

                $resultat->bindParam(':prenom',  $_POST['prenom'], PDO::PARAM_STR);
                $resultat->bindParam(':nom',  $_POST['nom'], PDO::PARAM_STR);
                $resultat->bindParam(':sexe',  $_POST['sexe'], PDO::PARAM_STR);
                $resultat->bindParam(':service',  $_POST['service'], PDO::PARAM_STR);
                $resultat->bindParam(':date_embauche',  $_POST['date_embauche'], PDO::PARAM_STR);
                $resultat->bindParam(':salaire',  $_POST['salaire'], PDO::PARAM_INT);

                $req = $resultat->execute();

                // Afficher un message "l'employé a été ajouté"
                if ($req) { // execute() renvoie TRUE en cas de succes de la requette, ou false.
                    echo 'l\'empoyé a bien été ajouté';

                } else {
                    echo 'il y a eu une erreur lors de l\'enregistrement';
                }

    }
}

?>

<h1>Formulaire 1</h1>

<?php echo $message; ?>

<form method="post" action="">

    <label for="id_employes">id_employes</label> <br>
    <input type="text" id="id_employes" name="id_employes" > <br>

    <label for="prenom">Prenom</label> <br>
    <input type="text" id="prenom" name="prenom" > <br>

    <label for="nom">nom</label> <br>
    <input type="text" id="nom" name="nom" > <br>

    <label>sexe:</label>
    <input type="radio" id="male" name="sexe" value='m' checked> <label for="homme">Male</label>
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
