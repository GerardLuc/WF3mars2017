<?php
// *******************************************
// PDO
// *******************************************
// L'extention PDO (PHP DATA OBJECT) definit une interface pour acceder a une base de données depuis php.

// *******************************************
// 01. Connexion
// *******************************************
echo '<h1>01. Connexion</h1>';

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// pdo est un objet issu de la classe prédéfinie PDO: il represente la co a la bdd.

/* Les arguments passés a PDO:
    -driver + serveur + nom de la bdd
    -pseudo du sgbd
    -mdp du sgbd
    -options: option 1 pour generer l'affichage des erreurs, option 2 = commande a executer lors de la connexion au serveur qui definit le jeu de caracteres des echanges avec la bdd

*/

print_r($pdo);
echo '<pre>'; print_r(get_class_methods($pdo)); '</pre>';

// *******************************************
// 02. exec() avec INSERT, INSPECt, DELETE
// *******************************************
echo '<h1>02. exec() avec INSERT, INSPECT, DELETE</h1>';

// $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Jean', 'Tartempion', 'm', 'informatique', '2017-04-25', 300)");

echo  "nombre d'enregistrements affectés par l'insert: $resultat <br>";

/*
    exec() est utilisé pour formuler des requetes ne retourrnant pas de jeu de resultat: INSERT, UPDATE ou DELETE

    Valeur de retour: 
        succes: integer correspondant au nombre de lignes integrées
        echac: false
        
*/

// echo "nombre d'enregistrements affectésd par l'INSERT: $resultat <br>";
echo 'Dernier id généré: ' . $pdo->lastInsertId();

// ---
$resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
echo  "nombre d'enregistrements affectés par l'UPDATE: $resultat <br>";


// ******************************************
// 03. query() avec SELECT + fetch
// ******************************************
echo '<h1>03. query() avec SELECT + fetch</h1>';

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
// Avec, query $result est un objet issu de la classe prédéfinie PDOStatement
/*

    Au contraire d'exec(), query() est utilisé pour la formation de requetes retournant un ou plusieurs resultats :

*/


echo '<pre>'; print_r($result); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>'; // On voie les nouvelles methodes de class PDOStatement

// $result constitue le resultat de la requete sous forme ineexploitable directement, il faut donc le transformer par la 
$employe = $result->fetch(PDO::FETCH_ASSOC); // Transforme l'objet $result en un array associatif exploitable indexé avec le nom des champs de la requette

echo '<pre>'; print_r($employe); '</pre>';
echo "Bonjour, je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(PDO::FETCH_NUM);
echo '<pre>'; print_r($employe); '</pre>';
echo $employe[1];

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch();
echo '<pre>'; print_r($employe); '</pre>';



$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(PDO::FETCH_OBJ);
echo '<pre>'; print_r($employe); '</pre>';
echo $employe->prenom; // Affiche la valeur la ppt du prenom employe

// Attention: il faut choisir l'un des fetch que vous voulez executer sur un jeu de resultats, vous ne pouvez pas faire plusieur fetch sur le même resultat n'en contenant qu'une seule. En effet cette methode deplace un curseur de lecture sur le resultat suivant. Ansi quand i ln'y en a qu'un seul on sort du jeu.

// Exercice :afficher le service de l'employé selon 2 methodes differentes de votre choix

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'Laura'");
$employe = $result->fetch(PDO::FETCH_OBJ);
echo '<pre>'; print_r($employe); '</pre>';
echo $employe->service;

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'Laura'");
$employe = $result->fetch(PDO::FETCH_NUM);
echo '<pre>'; print_r($employe); '</pre>';
echo $employe[0];


// ******************************************
// 04. While et fetch_assoc
// ******************************************
echo '<h1>04. While et fetch_assoc</h1>';

$resultat = $pdo->query("SELECT * FROM employes");

echo 'Nombre d\'employés : ' . $resultat->rowCount(). '<br>'; // Permet de compter le nombre de lignes retournées par la requette

while ($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){ // Fetch retournela ligne suivante du jeu de resultats en array associatif. La boucle while permet de faire avancer le curseur dans le jeu de resultats et s'arrete a la fin des resultats.
    echo '<pre>'; print_r($contenu); '</pre>'; // On voit que $contenu est un array associatif qui contient les données de chaque ligne du jeu de resultats. Le nom des indices correspondent aux noms des champs

    echo $contenu['id_employes'] . '<br>';
    echo $contenu['prenom'] . '<br>';
    echo $contenu['nom'] . '<br>';
    echo $contenu['sexe'] . '<br>';
    echo $contenu['service'] . '<br>';
    echo $contenu['date_embauche'] . '<br>';
    echo $contenu['salaire'] . '<br>';
    echo '-------------------<br>';
    
}

// Quand vous faites une requete qui ne sort qu'un seul resultat : pas de boucle while mais un fetch seul.
// Quand vous avec plusieurs resultats dans la requette: on fait une boucle while pour parcourir tous les resultats.

// ******************************************
// 05. fetchAll
// ******************************************
echo '<h1>05. fetchAll</h1>';

$resultat = $pdo->query("SELECT * FROM employes");

$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC); // retourne toutes les lignes de resultats dans un tableau multi-dimmensionnel sans faire de boucle: vous avez un array associatif a chaque indice numérique. Marche aussi avec FETCH_NUM

// echo '<pre>'; print_r($donnees); '</pre>';

// Pour lire le contenu d'un array multidimensionnel, nous faisons des boucles foreach imbriquées:
echo '<strong>Double boucle foreach</strong>';

foreach ($donnees as $contenu) {
    foreach ($contenu as $indice => $valeur){
        echo $indice. ' correspond à ' . $valeur . '<br>';
    }
    echo '-------------------<br>';
}


// ******************************************
// 06. Exercice
// ******************************************
echo '<h1>06. Exercice</h1>';

// Afficher la liste des bases de données présentent sur votre SGBD dans une liste <ul><li>
// Pour mémoire, la requette SQL est SHOW DATABASES

$resultat = $pdo->query("SHOW DATABASES");
$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);    
echo '<ul>';
foreach ($donnees as $contenu) {
    foreach ($contenu as $indice => $valeur){
        echo '<li>' . $valeur . '</li><br>';
    }
    echo '-------------------<br> ';
}
echo '</ul>';


$resultat = $pdo->query("SHOW DATABASES");
echo '<ul>';
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<li>';
            echo $donnees['Database'];
        echo '</li>';
    }
echo '</ul>';

// ******************************************
// 07. Table HTML
// ******************************************
echo '<h1>07. Table HTML</h1>';

$resultat = $pdo->query("SELECT * FROM employes");

echo '<table border = "1">';
    // Affichage de la ligne d'entetes:
    echo '<tr>';
        for($i = 0; $i < $resultat->columnCount(); $i++){
            echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre>'; // Pour voire ce que retourne la methode get ColumnMeta() : un array avec notament l'indice name qui contient le nom du champ
            $column = $resultat->getColumnMeta($i); // $column est un array qui contient l'indice name
            echo '<th>' . $column['name'] . '</th>'; // L'indice name contient le nom du champ
        }
    echo '</tr>';

    // Affichage des autres lignes
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
            foreach($ligne as $information){
                // echo '<pre>'; print_r($information); echo '</pre>';
                echo '<td>' . $information . '</td>';
            }
        echo '</tr>';
    }

echo '</table>';

// ******************************************
// 08. requette préparée : prepare() + bindParam() + execute()
// ******************************************
echo '<h1>08. requette préparée : prepare() + bindParam() + execute()</h1>';

$nom = 'sennard';

// Préparation de la requette
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom "); // on prépare la requette sans l'executer, avec un marqueur nominatif écrit :nom

// 'On donne une valeur au marqueur :nom
$resultat->bindParam(':nom', $nom, PDO::PARAM_STR); // je lies le marqueur :nom a la variable :nom. Si on change le contenu de la variable, la valeur du marqueur changera automatiquement si on fait plusieurs execute

// On execute la requete
$resultat->execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); // $données est un array associatif
echo implode($donnees, ' - '); // Implode transforme array en string

/*
    Prepare() renvoie toujours un objet PDOStatment
    execute() renvoie:
        Succes: un objet PDOStatment
        Echec: false

    Les requetes préparées sont a préconiser si vous executez plusieur fois la même requete (par exemple dans une boucle), et ainsi eviter le cycle complet analyse / interpretation/ execution de la requete

    Par ailleurs, les requettes préparées sont souvent utilisées pour assainir les données en forcant le type de valeurs communiquées aux marqueurs.
*/

// ******************************************
// 09. requette préparée : prepare() + bindParam() + execute()
// ******************************************
echo '<h1>09. requette préparée : prepare() + bindParam() + execute()</h1>';

$nom = 'Thoyer';

// Préparation de la requette
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom "); 

// 'On donne une valeur au marqueur :nom
$resultat->bindValue(':nom', $nom, PDO::PARAM_STR); 

// On execute la requete
$resultat->execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); // $données est un array associatif
echo implode($donnees, ' - ');

// Si on change la valeur de la variable $nom, sans faire un nouveau blindValue, le marqueur de la requete pointe toujours vers "Thoyer"
$nom = 'Durand';
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - '); // En effet on obtient encore les informatiosn de thoyer et non pas de durand.


// ******************************************
// 010. Exercices my SQL
// ******************************************
//Après avoir importé la BDD "bibliothèque", affichez dans une liste <ul><li> les livres empruntés par Chloé (il y en a plusieurs...), en utilisant une requête préparée.
echo '<h1>010. Exercices my SQL</h1>';


$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


$resultat = $pdo->prepare("SELECT l.titre FROM livre l INNER JOIN emprunt e ON e.id_livre = l.id_livre INNER JOIN abonne a ON a.id_abonne = e.id_abonne WHERE a.prenom = :prenom "); 

$prenom = 'chloe';

$resultat->bindPARAM(':prenom', $prenom, PDO::PARAM_STR);

$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);   

$resultat->execute();

echo '<ul>';
    while ($livre = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<li>';
            echo $livre['titre'];
        echo '</li>';
    }
echo '</ul>';


// ******************************************
// 011. FETCH_CLASS
// ******************************************
echo '<h1>011. FETCH_CLASS</h1>';

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
 
class Employes { // On déclare autant de ppt qu'il y a de champs dans la table employes. L'orthographe des ppts DOIT etre identique a celle des champs.
    public $id_employes;
    public $prenom;
    public $nom;
    public $sexe;
    public $date_embauche;
    public $salaire;
}

$result = $pdo->query("SELECT * FROM employes");

$donnees = $result->fetchAll(PDO::FETCH_CLASS, 'Employes'); // On obtient un array multidimensionnel indicé numériquement, qui contient a chaque indice un objet issu de la classe employee

echo '<pre>'; print_r($donnees);  echo '</pre>';

// On affiche le contenu de $donnees avec une boucle foreach
foreach ($donnees  as$employes){
    echo $employes->prenom;
}

// ******************************************
// 012. Points complementaires
// ******************************************
echo '<h1>012. Points complementaires</h1>';

// ----
echo'<strong>Le marqueur "?"</strong> <br> ';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ?"); // On prépare dans un premier temps la requette sans sa ^partie variable, que l'on a représenté avec des marqueurs sous forme de ?'

$resultat->execute(array('durand', 'damien')); // Durand va remplacer le premier "?" et Damien le second.

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);

echo implode($donnees, ' - ');



// -------
echo '<strong>On peut faire un execute() sans bindPARAM() </strong>';
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom AND prenom = :prenom");
$resultat->execute(array('nom' => 'durand', 'prenom' => 'damien'));

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - ');


// -------
echo '<strong>Afficher une erreur de requette SQL </strong>';
$resultat = $pdo->prepare("SELECT * FROM azerty WHERE nom = :nom AND prenom = :prenom");
$resultat->execute;

echo '<pre>'; print_r($resultat->errorInfo());  echo '</pre>'; // errorInfo() est une methode qui appartient a la classe PDOStatement et qui fournit des infos sur l'erreur SQL eventuellement produite. On trouve le message de l'erreur a l'indice[2] de l'array retourné par cette methode

// ******************************************
// 013. Mysqli
// ******************************************
echo '<h1>013. Mysqli</h1>';

//  Il existe une autre maniere de se connecter a une bdd et d'effectuer des requetes sur celle-ci: l'extention Mysqli

// Connexion a la bdd:
$mysqli = new Mysqli('localhost', 'root', '', 'entreprise');

// Un exemple de requete:
$requete = $mysqli->query("SELECT * FROM employes");

// Notez que les objets $mysqli (issuu de la classe definie en mysqli) et que $requete (issu de la classe Mysqli_result) ont des ppts et des methodes differentes de PDO. Nous ne pouvons donc pas mélanger les uns avec les autres.

// ****************************************************************************************





?>