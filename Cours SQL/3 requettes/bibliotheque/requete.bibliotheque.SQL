-- ******************************
-- Requettes Exercices
-- ******************************

-- 1- Quel est l'id abonné de Laura
SELECT id_abonne FROM abonne WHERE prenom = Laura;

-- 2- L'abonné d'id_abonné 2 est venu emprenter un livre a quelle date?
SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

-- 3- ombien d'emprunts ont été effectués en, tout?
SELECT COUNT(id_emprunt) FROM emprunt;

-- 4- Combien de livres sont sortis le 2011-12-19
SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie = '2011-12-19';

-- 5- Une Vie est de quel auteur?
SELECT auteur FROM livre WHERE titre = 'Une vie';

-- 6- De combien de livres d'Alexandre Dumas dispose-t-on'
SELECT COUNT(id_livre) FROM livre WHERE auteur = 'Alexandre Dumas';

-- 7- Quel id_livre est le plus emprunté?
SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1;

-- 8- Quel id_abonné emprunte le plus de livre?
SELECT id_abonne, COUNT(id_abonne) FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 1;



-- ******************************
-- Requettes imbriquées
-- ******************************
-- Syntaxe "aide mémoire" de la requête
    SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

-- Afin de realiser une requete imbriquée il faut obligatoirement un champ en commun entre les deux tables.

-- Un champ NULL se teste avec un IS NULL
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- Affiche les livres non rendus.

-- Afficher les titres de ces livres non-rendus:
SELECT titre FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

-- Afficher le livre que chloé a emprunté
SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'); -- Quand il n'y a qu'un seul résultat dans la requete imbriquée on met le signe "="


--  Exercice: afficher le prénom des abonnés ayant emprunté un livre le 2011-12-19
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = '2011-12-19');


-- Exercice: Afficher le prenom des abonnés ayant emprunté un livre d'Alphonse Daudet:
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livres WHERE auteur = 'Alphonse Daudet'));


-- Exercice: Afficher le titre de le/les titres que chloé n'a pas encore rendus
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'));

-- Exercice: combien de livres benoit a emprunté?
SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Benoit' );

-- Exercice: qui (prenom) a enprunté le plus de livres

SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1); --Limit ne peut pas etre utilisé dans IN (que dans =)



-- ******************************
-- Jointures internes
-- ******************************
--  Difference entre une jointure et une requete imbriquée : une requette imbriquée est possible seulement dans le cas ou les champs affichés (ceux qui sont dans le SELECT) sont issus de la même table
--  Avec une requette de jointure les champs sélectionnés  peuvent être issus de tables diffrentes. Une jointure est une requette permettant de faire des relations entre les diff tables afiin d'avoir des colonnes associées qui ne forme qu'UN SEUL resultat.

-- Afficher les dates de sortie et de rendu pour l'abonné Guillaume
SELECT a.prenom, e.date_sortie, e.date_rendu 
FROM abonne a 
INNER JOIN emprunt e 
ON a.id_abonne = e.id_abonne 
WHERE a.prenom = 'Guillaume';

-- 1ere ligne: Ce qu'on veut afficher
-- 2eme ligne: La 1ere table d'ou proviennent les infos
-- 3eme ligne: La 2nd table d'ou viennent les infos'
-- 4eme ligne: la jointure qui lie les 2 tables aven le champ commun
-- 5eme ligne: la ou les conditions supplementaires

-- Exercices: nous aimeriens connaitre les mvmts des livres (titres, date_sortie et date_rendu) écrits par alphonse daudet

SELECT l.titre, e.date_sortie, e.date_rendu FROM livre l INNER JOIN emprunt e ON l.id_livre = e.id_livre WHERE l.auteur = 'Alphonse Daudet';

-- Exercice : Qui a emprunté "Une vie sur l'année 2011"
SELECT a.prenom
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne 
INNER JOIN livre l
ON e.id_livre = l.id_livre
WHERE l.titre = 'Une vie' AND e.date_sortie BETWEEN '2011-01-01' AND '2011-12-31';

-- Exercice :Afficher le nombre de livre emprunté par chaque abonné:
SELECT a.prenom, COUNT(e.id_livre)
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne 
GROUP BY e.id_abonne;


-- Exercice : afficher qui a emprunté quels livres a quelles dates de sorties? (prénom, date_sortie, titre)
SELECT a.prenom, l.titre, e.date_sortie
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON e.id_livre = l.id_livre;


-- Afficher les prenoms des abonnés avec les id livres qu'ils ont empruntés:
SELECT a.prenom, e.id_livre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne;


-- ******************************
-- Jointures externes
-- ******************************
--  Une jointure externe permet de faire des requettes sans correspondance exgluée entre les valeurs requetées.

-- Ajouter vous dans la table des abonnés
INSERT INTO abonne (prenom) VALUES ('Luc');

-- En refaisant la requette précédente vous n'apparaissez pas.
-- Pour y remedier on fait une requette externe.
SELECT a.prenom, e.id_livre
FROM abonne a
LEFT JOIN emprunt e
ON a.id_abonne = e.id_abonne;

-- La clause LEFT JOIN permet de rapatrier toutes les données dans la table considérées comme étant a gauche de l'instruction LEFT JOIN Sans correspondance exigée dans 'lautre table.

-- Vici le cas ou un klivre esst supprimé de la bibliotheque.
DELETE FROM livre WHERE id_livre = 100;

-- On visualise avec une jointure interne:
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt
INNER JOIN livre
ON emprunt.id_livre = livre.id_livre;
-- On ne voie pas dans cette requette le livre supprimé de la base de données


-- Avec une jointure externe
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt
LEFT JOIN livre
ON emprunt.id_livre = livre.id_livre;
-- Ici les emprunts sont tous affichés mais les livres retirés sont remplacés par NULL


-- ******************************
-- UNION
-- ******************************
-- Union permet de fusionner le resultat de deux requettes de la même liste de resultats

-- Exemple: si on desinscrit guillaume, on peut afficher a la fois tous les livres empruntés, y compris ceux empruntés par des lecteurs desinscrits, et tous les abonnés, y compris ceux qui n'ont jammais emprunté

-- Supression de guillaume
DELETE FROM abonne WHERE id_abonne = '1';

