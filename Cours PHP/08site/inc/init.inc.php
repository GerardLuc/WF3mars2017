<?php
/*

    Le fichier init.inc.php sera inclu dans tous les scripts (hors fichiers inc eux-mêmes) pour initialiser les elements suivants:
    - connexion a la bdd
    - creation ou ouverture de session
    - definir une constante pour le chemin du site
    - et inclusion du fichier fonction.inc.php systematiquement dans tous les sctripts

*/
$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Session
session_start();
// chemin du site
define('RACINE_SITE', '/Cours%20PHP/08site/'); // indique le dossier dans lequel se situe le site sans 'localhost'

// Déclaration des variables d'affichage du site
$contenu = '';
$contenu_gauche = '';
$contenu_droite = '';

// Autres inclusions
require_once('fonction.inc.php');