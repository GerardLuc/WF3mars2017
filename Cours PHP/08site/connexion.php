<?php
require_once('inc/init.inc.php');


// --------------------- TRAITEMENT --------------------------
// déconnexion demandée par l'internaute
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    // Si l'internaute demande la deconnexion, on détruit la session
    session_destroy();
}


// internaute déja connecté:
if (internauteEstConnecte()){ // si l'internaute est déja connecté il n'a rien a faireici. On le redirige donc vers son profile.
    header('location:profil.php');
}

// Traitement dde connexion et remplissage du formulaire
if(!empty($_POST)){
    // controlle du formulaire
    if(empty($_POST{'pseudo'})){
        $contenu .= '<div class="bg-danger">Le pseudo est requis</a></div>';
    }

    if(empty($_POST{'mdp'})){
        $contenu .= '<div class="bg-danger">Le mot de passe est requis</a></div>';
    }

    // Si le formulaire est correct on controlle les id

    if(empty($contenu)){
        $mdp = md5($_POST['mdp']); // on crypte le mdp pour le comparer avec celui de la base
        $resultat = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp", array(':pseudo' =>$_POST['pseudo'], ':mdp' => $mdp));

        if ($resultat->rowCount() != 0){ // Si il y a un enregistrement dans le resultat c'esdt que le pseudo et md correspondent
            $membre = $resultat->fetch(PDO::FETCH_ASSOC); // Pas de while ici car il n'y a qu'un seul pseudo de même nom
            echo '<pre>'; print_r($membre); echo '</pre>';

            $_SESSION['membre'] = $membre; // nous remplissons la session avec les elements provenant de la bdd. Cette session permeet de conserver les infos du membre dans l'ensemble de la bdd

            header('location:profil.php'); // le membre etant connecté, on l'envoie vers son profil.
            exit();
        } else {
            // Si les id ne correspondent pas, msg d'erreur'
           $contenu .= '<div class="bg-danger">Les identifiants sont incorrects</a></div>';
            
        }
    }
}



// --------------------- AFFICHAGE --------------------------
require_once('inc/haut.inc.php');
echo $contenu;
?>

<h3>Veuillez renseigner vos identifiants pour vous connecter</h3>
<form action="" method="post">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" value=""><br><br>

    <input type="submit" value="se connecter" class="btn">
</form>


<?php
require_once('inc/bas.inc.php');