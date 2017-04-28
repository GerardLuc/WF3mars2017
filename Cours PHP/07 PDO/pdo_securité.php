<?php
// ---------------------------------
// Cas pratique: un espace de commentaires
// ---------------------------------

/*
    Objectif: nous allons créer un espace de commentaires type avis ou livre d'or.

    Modélisation de la BDD "dialogue":
        Table: commentaire
        Champs: id_commentaire          INT(3) PK AI
                pseudo                  VARCHAR(20)
                message                 TEXT
                date_enregistrement     DATETIME

*/

// II. Connexion a la bdd
$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(!empty($_POST)){

    // 3. Traitement contre les failles XSS (injection JS) ou les injections CSS: on parle d'echappement des données recues
    // Pour l'exemple on va injecter dans le champ message le code suivant: <style>body{display:none}</style>
    // Pour un autre exemple on va injecter le code js suivant: 
    // <script>while(true){alert('vous l'avez dans le cul XDDDD')}</script>

    $_POST['pseudo'] = htlmspecialchars($_POST['pseudo'], ENT_QUOTES);
    $_POST['message'] = htlmspecialchars($_POST['message'], ENT_QUOTES); // htmlspecialchars convertit les caracteres speciaux (', ", <, >, &') en entites html (par exemple > devient &lt;), ce qui permet de rendre innofensives les balises HTML. ENT_QUOTES ajoute les ' a la liste des caracteres convertis

    // En complement : 
    $_POST['message'] = strip_tags($_POST['message']); // Retire toutes les balises HTML contenues dans des balises HTML
    // htmlentities() permet lui aussi de convertir les balises HTML en entites HTML

    // 1 - Nous allons faire une premiere requête qui n'est pas protégée contre les injections et qui n'accepte pas les apostrphes
    // $r = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]'  ) ");

    // 2 - Nous allons faire une injection SQL : dans le champ message, saisir ok'); DELETE FROM commentaire; (
    // Pour se prémunir des erreurs SQL et mettre les appostrophes, nous pouvons faire une requete préparée
    $stmt = $pdo->prepare("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message) ");

    $stmt->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $stmt->bindParam(':message', $_POST['message'], PDO::PARAM_STR);

    $stmt->execute();

} // fin du if (!empty($_POST))

?>
<!--I. Formulaire de saisie du message-->
<h1>Cas pratique: un esspace commentaire</h1>


<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="pseudo">Message</label><br>
    <textarea name="message" id="message"></textarea><br><br>
    
    <input type="submit" name="envoi" value="envoi">
</form>

<?php
// III Affichage des msg contenus dans les bdd
$resultat = $pdo->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d-%m-%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");

echo '<h2>' . $resultat->rowCount() . 'commentaire(s) </h2>';

while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo '<div>';
        echo '<p> Par ' . $commentaire['pseudo'] . ' le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</p>';
        echo '<p>' . $commentaire['message'] . '</p>';
    echo '</div> <hr>';

}