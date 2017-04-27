<?php
// ----------------------------
// Les sessions
// ----------------------------
/*
    Le terme de Session desingne la periode de temps correspondant a la navigation continue de l'internaute sur un site: continue, car si l'internaute ferme le navigateur, la session s'interromp.

    Principe Un fichier appellé session est créé sur le serveur, avec un identifiant unique. Cette session est liée a un internaute car, dans le même temps, un cookie est déposé sur le poste de l'internaute avec l'identifiant. Ce cookie se détruit lorsqu'on quitte le navigateur.

    On stocke entre autre dans une session, les paniers d'achats ou les informations de connexion. Ces infos sont accessibles dans tous les scripts du site gracea la session.
*/

// Création ou ouverture d'une session:
session_start(); // Permet de créer un fichier de session sur le serveur OU de l'ouvrir s'il existe déja

// Remplissage de la session:
$_SESSION['pseudo'] = 'jhon';
$_SESSION['mdp'] = '1234';

echo '1- La session apres remplissage: ';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Vider une partie de la session en cours
unset($_SESSION['mdp']);

echo '<br> 2- la session apres supression du mdp: ';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Supression de la session
// session_destroy(); // Supression de la session MAIS il faut savoir que le session_destroy est d'abord vu par l'interpreteurqui ne l'execute qu'a la fin du script
echo '<br> 2- la session apres supression totale: ';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; // En effet on voie encore le contenu de la session la la suppression n'intervient qu'a la fin du script. Pour s'en convaincre, verigfeir que le fichier est supprimé dans le dossier xxamp.tmp'

// rien a voire avec l'autre fichier session, mais il y accede quand même. 