<?php 
$pdo = new PDO('mysql:host=localhost;dbname=Sallea', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Session
session_start();
// chemin du site
define('RACINE_SITE', '/Cours PHP/08site/'); // indique le dossier dans lequel se situe le site sans 'localhost'

// Déclaration des variables d'affichage du site
$contenu = '';
$contenu_gauche = '';
$contenu_droite = '';

// Autres inclusions
require_once('fonction.inc.php');
?>