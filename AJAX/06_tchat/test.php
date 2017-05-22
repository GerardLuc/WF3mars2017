<?php 

$pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = 'test' ");
$membre = $resultat->fetch(PDO::FETCH_ASSOC);

if($resultat->rowCount() == 0)
echo 'ok';
else
echo 'nok';