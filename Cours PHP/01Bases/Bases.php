<style>h2{font-size: 15px; color: red; }</style>

<?php

// -------------------------
echo '<h2>Les balises PHP <h2>';
// -------------------------
?>

<?php
// Pour ouvrir un passage en PHP, on utilise la balise précédente.
// Pour fermer un passage en php on utilise la balise suivante:
?>

<strong>Bonjour</strong> <!-- en dehors des balises d'ouverture et de fermetures, nous pouvons écrire du HTML -->

<?php
// -------------------------
echo '<h2> Ecriture et affichage </h2>';
// -------------------------
echo 'Bonjour'; // Echo est une instruction qui nous permet d'effectuer un affichage. Notez que les instructions se termient par un ";"
echo '<br>'; // Les balises HTML sont interprétées comme telles dans echo.

print 'Nous sommes jeudi'; // Print est une autre instruction d'affichage. 

// pour info il existe d'autres instructions d'affichage (cf plus loins):
// print_r();
// var_dump();

// -------------------------
echo '<h2>Variable: types/déclarations/affectation </h2>';
// -------------------------
// Definition: une variable est un espace mémoire ommé qui permet de conserver une valeur.
// En php, on déclare une variable avec le signe $

$a = 127; // Je déclare la variable a et lui affecte la valeur 127
// Le type de la variable est integer (entier)

$b = 1.5; // un type double pour un nombre a virgule

$a = 'une chaine de caracteres'; // Type de string pour une chainde de caracteres
$b = '127'; // String car il y a des quotes

$a = true;  // Type boolean qui pernds les deux valeurs "true" ou "false"




// -------------------------
echo '<h2> Concaténation </h2>';
// -------------------------
$x = 'bonjour ';
$y = 'tout le monde';
echo $x . $y . '<br>'; // Point de concaténation que l'on peut traduire par 'suivit de '

echo "$x $y <br>"; // On obtient le même resultat sans concaténation

// ---------
// Concaténation lors de l'affectaion:
$prenom1 = 'Bruno'; // Déclaration de variable
$prenom1 = 'Claire'; // Ici la variable claire écrase Bruno car déclarée apres

echo $prenom1 . '<br>'; // Affiche claire

$prenom2 = 'Bruno '; 
$prenom2 .= 'Claire'; // Ajoute a la valeur presente

echo $prenom2 . '<br>'; // Affiche 'Brunoi Claire'


// -------------------------
echo '<h2> Guillemets et quotes </h2>';
// -------------------------
$message = "aujourd'hui"; // Ou bien:
$message = 'aujourd\'hui'; //

$txt = 'Bonjour';
echo "$txt tout le monde <br>"; // Variables évaluées
echo '$txt tout le monde <br>'; // Variables non evaluées


// -------------------------
echo '<h2> Constantes </h2>';
// -------------------------
// Une constante permet de conserver une valeur qui ne peut pas etre modifiée durant la durée du script. Tres utile pour garder de maniere certaine la connection a une BDD ou le chemin du site part exemple.$_COOKIE

define("CAPITALE", "Paris"); // Define permet de délcarer une constante don't indique d'abord le nom, puis la valeur.

echo CAPITALE . '<br>'; // Affiche Paris

// Constantes magiques:
echo __FILE__. '<br>'; // Afiche le chemin complet du fichier dans lequel on est
echo __LINE__. '<br>'; // Affiche la ligne sur laquelle on est.

// -------------------------
echo '<h2>Operateurs arithmétiques</h2>';
// -------------------------
$a = 10;
$b = 2;

echo $a + $a . '<br>'; // Affiche 12
echo $a - $b . '<br>'; // Affiche 8
echo $a * $b . '<br>'; // Affiche 20
echo $a / $b . '<br>'; // Affiche 5
echo $a % $b . '<br>'; // Affiche 0

// ------
// Operations et affectations combinées
$a += $b; // a vaut a présent 12
$a -= $b; // a vaut a présent 10 (a nouveau)
$a *= $b; // a vaut a présent 20
$a /= $b; // a vaut a présent 5
$a %= $b; // a vaut a présent 0

// -----
// Incrémenter et décrémenter
$i = 0;
$i++; // i vaut 1
$i--;

$k = ++$i; // La variable est incrémentée de 1, puis affectée a K
echo $i . '<br>';
echo $k . '<br>';

$k = $i++; // K prends la valeur i puis on incrémente i de 1
echo $i . '<br>';
echo $k . '<br>';

// -------------------------
echo '<h2> Structures conditionelles et operateurs de comparaisons </h2>';
// -------------------------
$a = 10; $b = 5; $c = 2;

if ($a > $b) { // Si la condition renvoie true, on execute le if
    echo'$a est bien superieur a $b <br>';
} else { // Si la condition renvoie false on execute le else
    echo' non, c\'est $b qui est superieur a $a';
}

// ------
if ($a > $b && $b > $c) { // Si la condition renvoie true, on execute le if
    echo'Les deux conditions sont vraies <br>';
} ;

// -----
if ( $a == 9 || $b > $c){ // L'operateur de comparaison est == et l'oiperateur "ou" s'écrit ||'
    echo'ok pour une des conditions <br>';
} else {
    echo'Les deux conditions sont fausses <br>';
}

// -----
if ($a == 8) {
    echo 'reponse 1 <br>';
} elseif ($a !=10){
    echo 'reponse 2 <br>';
} else {
    echo'reponse 3 <br>';
}

// -----
if ($a == 10 XOR $b == 6) { // Si les deux sont vraies ou fausses, oon entre pas dans les acollades
    echo'ok pour la condition exclusive <br>';
}
// Pour que la cond s'execute, il faut que l'une soit vraie et l'autre fausse


// -----
// Condition ternaire (forme contractée de la condition)
echo ($a == 10) ? '$a est egal a 10 <br>' : '$a est different de 10 <br>'; // ? remplace if, : remplace else. 

// -----
// Difference entre == et ===:
$vara = 1; // Integer
$varb = '1'; // String

if ($vara == $varb){
    echo' il y a egalité entre les 2 variables <br>';
}

if ( $vara === $varb){
    echo 'il y a égalité en valeur ET en type entre les deux variables <br>';
}

// Avec le === la comparaison ne fonctionne pas car les variables ne sont pas du même type
// Avec le == on ne compare que la valeur

/*
= signe d'affectaion
== comparaison de valeur
=== comparaison de valeur et type
*/

// -----
// empty() et isset() :
// empty() teste si c'est vide (donc si c'est '0', 'NULL', ' ' ou non defini
// isset() teste si c'est defini et a une valeur non NULL

$var1 = 0;
$var2 = '';

if (empty($var1)) echo 'on a 0, vide ou non definition <br>';
if (isset($var2)) echo 'var2 existe bien <br>';

// La difference est que si on met les lignes 199 et 200 en commentaires, empty reste vrai car $var1 n'est pasz defini alors que isset est faux car $var2 n'est pas defini

// Empty est utilisé pour verifier, par exemple, que les champs d'un formulaire sont remplis. Isset permet de verifier l'existence d'un indice dans un array avant de verifier.

// phpinfo();

// -------------------------
echo '<h2> Conditions switch </h2>';
// -------------------------
// Dans le switch ci-dessous, les "case" representent les cas differents dans lesquels on peut potentiellement tomber
$couleur = 'jaune';

switch($couleur) {
    case 'bleu' : echo 'vous aimez le bleu'; break;
    case 'rouge' : echo 'vous aimez le rouge'; break;
    case 'vert' : echo 'vous aimez le vert'; break;
    default: echo 'vous n\'aimez ni le bleu ni le rouge ni le vert <br>';
}

// Le switch compare la valeur de la variable entre les parentheses a chaque case. Lorsqu'une valeur correspond, on execute l'instruction en regard du case, puis le break qui indique qu'il faut sortr de la condition
// Le défaut correspond a un else: on l'execute par defaut quand aucun case ne correspond


if ($couleur == 'bleu') {
    echo 'vous aimez le bleu <br>';
} elseif ($couleur == 'rouge'){
    echo 'vous aimez le rouge <br>';
} elseif ($couleur == 'vert') {
    echo 'vous aimez le vert <br>';
} else {
    echo 'VOUS AIMEZ RIEN <br>';
}


// -------------------------
echo '<h2> Fonctions prédéfinies </h2>';
// -------------------------
// Une fonction prédéfinie permet de réaliser un traitement spécifique qui est prévu dans le language.

// -----
echo '<h2>Traitement des chaines de caracteres (strlen, strpos, substr</h2>';
$email1 = 'prenom@site.fr';

echo strpos($email1, '@') . '<br>'; // Indique la position 6 du @ dans la chaine email.
echo strpos('bonjour', '@');
var_dump(strpos('bonjour', '@'));
// Lors de l'utilisation d'une fonction predefinie, demander les arguments a fournin pour qu'elle s'execute correctement et ce qu'elle peut retourner comme resultat.
//  pour strpos: suvves => integer, echec => boolean "false"

// -------
$phrase = 'mettez une phrase a cette endroit';
echo strlen($phrase) . '<br>';

// ---------
$texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, iste eos et suscipit cum aspernatur iure quae ducimus maiores reprehenderit repellendus perferendis, amet facere totam. Officia odit, fugiat quo veniam.';
echo substr($texte, 0, 20) . '...<a href="">Lire la suite</a> <br>' ; // On découpe une partie du texte et on y concatene un lien

// --------
echo str_replace('site', 'gmail', '$email1'); // Remplace site par gmail dans le string contenu dans email

// -------
$message = '          Hello world         ';
echo strtolower($message) . '<br>'; // Passe le string en min
echo strtoupper($message) . '<br>'; // Passe le string en maj

echo strlen($message) . '<br>';
echo strlen(trim($message)) . '<br>';
// Supprime les espaces au débuts ete a la fin d'un string


// -------------------------
echo '<h2> Le manuel PHP online </h2>';
// -------------------------
// http://php.net/manual/fr/

// -------------------------
echo '<h2> Gestion des dates </h2>';
// -------------------------
echo date('d/m/Y H:i:s') . '<br>';

echo time() . '<br>';

$dateJour = strtotime('10-01-2016');
echo $dateJour . '<br>';

$dateFormat = strftime('%Y-%m-%d', $dateJour);
echo $dateFormat . '<br>';

// Exemple de conversion de format de date
echo strftime('%Y-%m-%d', strtotime('23-05-2015'));
// ou l'inverse

// Cette methode de transformation est limitée dans le temps (2038)...On peut donc utiliser une autre methode avec la classe DateTime:
$date = new DateTime ('11-04-2017');
echo $date->format('Y-m-d') . '<br>' ;

// DateTime est une classe qu'on peut comparer a un plan ou un modele qui sert a construire des objets "date";
// On construit un objet "date" avec le mot new en indiquant que la date qui nous interesse entre parentheses.
// Cet objet beneficie de methodes (= fonctions)offetres par la classe "il y a" ebntre autres, la methode format quipermet de modifier le format d'une date. 


// phpinfo();

// -------------------------
// Entrer une valeur dans une variable sous condition (PHP7)

$var1 = isset($maVar) ? $maVar : 'valeur par defaut';
echo $var1 . '<br>'; // Affiche 'valeur par defaut'

$var2 = $maVar ?? 'valeur par defaut'; // même chose en plus court
echo $var2 . '<br>';

$var3 = $_GET['pays'] ?? $_GET['Ville'] ?? 'pas d\'info'; // Soit on prends le pays s'il existe, soit la ville si elle existe, sinon on prends 'pas d'info' par defaut
echo $var3 . '<br>';


// -------------------------
echo '<h2> Fonctions utilisateur </h2>';
// -------------------------
// Les fonctions qui ne sont pas prédéfinies dans le language sont déclarées puis éxécutées par l'utilisateur. 

// Declaration d'une fonction :
function separation() {
    echo '<hr>'; // Simple fonction permettant de tirer un traint dans la page web
}

// Appel de la fonction:
separation(); // Execution

// ------
// Fonction avec des arguments: les arguments sont des parametres fournis a la fonction et lui permettent de completer ou modifier son comportement initialement prévu
function bonjour($qui) {
    return 'Bonjour ' . $qui . '<br>'; // Permet de renvoyer ce qui suit le return a l'endroit ou la fonction est appellée
}

// Appel de la fonction
echo bonjour('Pierre'); // Appelle la fonction en lui donnant le string 'pierre' en argument.

$prenom = 'Etienne';
echo bonjour($prenom); // L'argument peut être une variable

// ------
// Exercice
function appliqueTva($nombre){
    return $nombre * 1.2;
}

// Ecrivez une fonction appliquant appliqueTva2 sur la base de la precedente mais en donnant les possibilités de calculer un combre avec le taux de notre choix
function appliqueTva2($nombre, $taux){
 return $nombre * $taux;
}
echo appliqueTva2(100, 1.5) . '<br>'; // Lorsqu'une fonction attends des arguments, il faut obligatoirement les lui donner


function meteo($saison, $température){
    echo "Nous sommes en $saison et il fait $température degré(s) <br>";
}

meteo('hivers', 2);
meteo('printemps', 2);

// Créer une fonction meteo2 qui permet d'afficher "au printemps" quand il s'agit du printemps

function meteo2($saison, $température){
    if ($saison == 'printemps'){
        $article = 'au';
    } else {
       $article = 'en';
}
    echo "Nous sommes $article $saison et il fait $température degré(s) <br>";
}   

meteo2('printemps', 4);
meteo2('hivers', 4);

function meteo3($saison, $temperature){
    $article = ($saison == 'printemps')? 'au' : 'en';
    echo "Nous sommes $article $saison et il fait $temperature degré(s) <br>"; 
}
meteo2('printemps', 4);
meteo2('hivers', 4);


// Exercice

function prixLitre(){
    return rand(1000,2000)/1000;
}

function factureEssence( $nombreLitre){
    $totalFacture = $nombreLitre * prixLitre();
    echo 'Votre facture est de $nombreLitre euros pour 50L d\'essence  <br>';

}

factureEssence(50);


// -------------------------
echo '<h2> Les variables locales et globales </h2>';
// -------------------------

function jourSemaine(){
    $jour = 'vendredi';  // Ici dans la fonction nous sommens dans un espace local. La variable $jour est donc Locales
    return $jour;
}

// echo $jour; // on ne peut pas utiliser de var locale dans 'lespace global
echo jourSemaine() . '<br>';


// ----- 
$pays = 'France'; // variable globale
function affichagePays(){
    global $pays; // Permet de req une variable de l'espace global
    echo $pays; // On peut donc utiliser cette variable $pays
}
affichagePays();

// -------------------------
echo '<h2> Les structures iteratives: boucles </h2>';
// -------------------------
// Boucle while
$i = 0; // Valeur de départ de la boucle
while ($i < 3){
    $pointillets = ($i < 2)? '---' : '';

    echo "$i $pointillets";
    $i++; // ne pas oublier d'incrementer i pour que la boucle soit pas infinie
}
echo '<br>';
?>


<select>

<?php
$a = date('Y') - 100;

while($a <= date('Y')){
    echo "<option>$a</option>";
    $a++;
}

echo '</select>';

// -------------------------
// Boucle do while
// La boucle do whilea la particularitéde s'executer au moins 1 foistant que la condition de fin est vraie.

echo '<br>Boucle do while <br>';

do {
    echo 'un tour de boucle';
} While (false); // On met la condition pour executer les tours de boucle. On effectuee un tour bien que la condition soit fausse.

// Notez la presence du ";"

// -------------------------
// Boucle while
echo '<br>';
for ($j = 0; $j < 16; $j++){ // initialisation de la valeur de depart; condition d'entrée
    print $j . '<br>';
}


// ---
// Exercice
// 1- Faire une boucle qui affiche de 0 a 9 sur la même ligne
echo '<br>';
for ($k = 0; $k < 10; $k++){ // initialisation de la valeur de depart; condition d'entrée
    print $k;
}
// 2- faites la même chose dans un tableau html.

?>

<table border = 1>

<?php

echo '<br>';
for($l = 0; $l < 10; $l++){
    print "<td>$l</td>";
}
echo '</table>';


echo '<br>';
echo '<table border = 1>';
    for($m = 0; $m < 10; $m++){
        echo'<tr>';
        for($n = 0; $n < 10; $n++){
            print "<td>$n</td>";
        }
        echo '</tr>';
    }
echo '</table>';

// en while:

echo '<hr>';
echo '<table border ="1">';
    $o=0;
    while($o < 10){
        echo'<tr>';
            for($p = 0; $p <= 9; $p++){
                print "<td>$p</td>";
            }
        $o++;
        echo '</tr>';
    }

echo '</table>';

// -------------------------
echo '<h2> Les arrays ou tableaux </h2>';
// -------------------------
// on peut stocker dans un array une multitude de valeurs, quelque soit leur type.

$list = array('grégoire', 'natalie', 'emilie', 'francois', 'georges'); // Declaration d'un array appellé $liste contenant des prenoms

// echo $liste; // erreur car on peut pas afficher dirrectement le contenu d'un array
echo '<pre>'; var_dump($list); echo'</pre>';
echo '<pre>'; print_r($list); echo'</pre>';


// Autre moyen d'affecter des valeurs dans un tableau:
$tab[] = 'France'; // Ajoute la valeur france au tableau $tab
$tab[] = 'Italie';
$tab[] = 'Espagne';
$tab[] = 'Portugal';

print_r($tab); // Voire le contenu du tableau
echo $tab[1]; // Affiche italie

// Tableau associatif: tableau dont les indices sont littéraux
$couleur = array("j" => "jaune", "b" => "bleu", "v" => "vert" );
echo '<br>';
// Pour acceder a un element du tableau associatif:
echo 'la seconde couleur de notre tableau est le ' . $couleur['b'] . '<br>';

// -------
// Compter la taille d'un array
echo 'taille du tableau: ' .count($couleur) . '<br>';
echo 'taille du tableau: ' .sizeof($couleur) . '<br>';

// -------
// Transformer un array en string
$chaine = implode('-', $couleur); // Rassemble les elements d'un array en une chaine séparés par le séparateur '-' ici
echo $chaine . '<br>';

$couleur2 = explode('-', $chaine);
print_r($couleur2);

// ---------
echo '<h2>La boucle foreach pour parcourir les arrays</h2>';
// Moyen simple depasser en revue un tableau.

echo '<pre>'; print_r($tab);
foreach($tab as $valeur) { // La variable $valeur recupere a chaque tour de boucle les valeurs qui sont parcourus dans m'array tab.
    echo $valeur. '<br>';
}

foreach($tab as $indice => $valeur){ // On parcourt l'array $tab par ses indices auxquels on associe des valeurs. Quand il y a deux variables, la premiere parcourt la colone des indices et la seconde la colone des valeurs. Ces variables peuvent avoir n'importe quel nom.
    echo ' correspond à ' . $couleur . '<br>';
}

// -------------------------
echo '<h2> Les arrays multidimensionnels </h2>';
// -------------------------
// Nous parlons de tableux multidimensionnels quand un tableau est contenu dans un autre tableua. Chaque tableau represente une dimension.

// Création d'un tableau multidimensionnel.
$tab_multi = array(
        0  => array('prenom' => 'Julien', 'nom' => 'Dupont', 'tel' => '06 00 00 00' ),
        1  => array('prenom' => 'Nicolas', 'nom' => 'Durand', 'tel' => '06 00 00 00' ),
        2  => array('prenom' => 'Pierre', 'nom' => 'Duchemol')
);

echo '<pre>'; print_r($tab_multi); echo '</pre>';

// acceder a la valeur julien:
echo $tab_multi[0]['prenom'] . '<br>'; // Affiche julien: nous entrons d'abord a l'indice 0 pour aller ensuite danss l'indice dans l'autre tableau à l'indice 'prenom'. Notez que 'prenom' est un string.


// Parcourir le tableau multidimensionnel avec une boucle for:
for ($i = 0; $i < count($tab_multi); $i++){
    echo $tab_multi[$i]['prenom'] . '<br>';

}

// Exercice : afficher les prenoms avec une boucle foreach:


foreach($tab_multi as $indice => $valeur){
    // Version 1
    echo $tab_multi[$indice]['prenom'] . '<br>';
    // print_r($valeur);
    // Version 1
    // echo $valeur['prenom'] . '<br>';
}

// -------------------------
echo '<h2> Les fichiers d\'inclusion </h2>';
// -------------------------

echo 'premiere inclusion';
include('exemple.inc.php'); // On inclut le fichier dont le chemin est spécifié ici

echo '<br>Deuxieme inclusion';
include_once('exemple.inc.php'); // Avec once, on verifie d'abord si le fichier n'est pas déja unclus,, avant de faire l'inclusion.

echo '<br>Troisieme inclusion';
require('exemple.inc.php'); // même chose qu'include, mais génere une erreur de type fatale s'il ne parvient pas a inclure le fichier, qui interromp l'execution de script. En revanche, include genere une erreur de type warning ce qui n'interromp pas la suite de l'execution du script.

// Le ".inc" du nom du fichier inclut est la a titre indicatif pour préciser qu'il s'agit d'un fichier inclus et non pas d'un fichier directement utilisé.

// *******************************************

// -------------------------
echo '<h2> Introduction aux objets </h2>';
// -------------------------
// Un objet est un autre type de données. Un objete est issu d'une classe qui possede des attributs (ppts) et des methodes(= fonctions)
// L'objet créé a partir d'une classe peut acceder a ces atrributs et ces methodes

//  Exemples avec un personnage de type 'etudiant':
class Etudiant {
    public $prenom = 'Julien'; // Publique pour preciser que l'element est accessible partout eet donc en dehors de la classe
    public $age = 25;
    public function pays();
        return 'Fance';

        
}

$objet = new Etudiant ();

echo '<pre>'; print_r($objet); echo '</pre>';
echo $objet->prenom . '<br>'; // On peut acceder a une ppt d'un objet en mettant une fleche "->"

// ----
// Contexte : sur un site, une classe Panier contiendra les ppts et les methodes nessessaires au fonctionnement du panier d'achat:
class Panier {
    public function ajout_article($article){
        return "L'article $article a bien été ajouté au panier.";
    }
}

// Lorsqu'ob clique sue le bouton "ajouter au panier"
$panier = new Panier(); // On crée un panier vide dans un premier temps.



// *******************************************
