
-- Ouvrir SQL sous XAMP:
--   cd c:\xampp\mysql\bin
--   mysql.exe -u root --password


-- Ligne de commentaire en SQL commence par --
-- Les requetes ne sont pas sensibles a la casse, mais une convention indique qu'il faut mettre les mots clés des requettes en MAJUSCULES.

-- ******************************
-- Requettes générales
-- ******************************

CREATE DATABASE entreprise;  --Créer une nouvelle base de données appellée "entreprise"

SHOW DATABASES;  --Permet d'afficher les BSS disponibles.'

-- NE PAS COLLER DANS LA CONSOLE
DROP DATABASE entreprise; --détruit la bdd entreprise

DROP table employes; --supprimer la table employés

TRUNCATE employes;  -- vider la table employes de son contenu

-- On peut coller dans la console
USE entreprise;  -- Se connecter a la BDD entreprise

SHOW TABLES; --Permet de listed les tables de la BDD en cours d'utilisation

DESC employes; -- observer la scructure de la table ainsi que les champs (DESC pour DESCRIBE)


-- ******************************
-- Requettes de selection
-- ******************************

SELECT nom, prenom FROM employes; -- affiche (selectionne) le nom et le prenom de la table employes: SELECT selectionne les champs indiqués, FROM la ou les tables utilisées

SELECT service FROM employes; -- affiche les services de l'entreprise

-- DISTINCT
-- On a vu dans la requette précédente que les services sont affichés plusieur fois. Pour éliminer les doublons, on utilise DISTINCT
SELECT DISTINCT service FROM employes;

-- All ou*
-- On peut afficher toutes les informations issues d'une table avec une "*"

SELECT * FROM employes;

-- clause WHERE
SELECT prenom, nom FROM employes WHERE service = 'informatique'; -- Affiche le nom et prénom des employés du service 'informatique'. Notez que le nom des champs ou des tables ne prennent pas de quotes, alors que les valeurs telles que 'informatiques' p:rennent des quotes ou des guillemets. Cependant, s'il s'agit d'un chiffre, on  ne lui dit met pas de quote.

-- BETWEEN
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31'; -- affiche les employes dont la datre d'embauche est entre 2006 et 2010

-- LIKE
SELECT prenom FROM employes WHERE prenom LIKE 's%'; -- Affiche les prenoms des employes commençant par s. Le signe % est un 'joker' qui remplace les autres caracteres.

SELECT prenom FROM employes WHERE prenom LIKE '%-%';

-- Operateurs de comparaisons :
SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; --Affiche les employés qui ne sont pas dans le service 'informatique'

--      -
--      <
--      >
--      =
--      >=
--      <=
--      != ou <> pour different de 

-- ORDER BY pour faire le tri
SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire;
-- affiche les employés par salaire par ordre croissant (par defaut)

SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenom DESC;
-- ACS: acendant
-- DESC: décroissant. 
-- Ici salaire par odre croissant et a salaire identique prénom par ordre décroissant.

-- LIMIT
SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;
-- affiche l'employé avec le salaire le plus élevé.
-- On trie les salaires par ordre décroissant pour avoir le plus élevé en premier puis on limite le resultat au premier enregistrement avec limite 0,1
-- 0 est le point de départ de limit, 1 signifie prendre 1 enregistrement.Utilisé dans la pagination des sites.

-- L'alias avec AS:
SELECT nom, prenom, service, salaire * 12 AS salaire_annuel FROM employes;
-- Affiche le salaire sur 12 mois des employes. Salaire_annuel est un alias qui "stoque" la valeur précédente.

SELECT SUM(Salaire * 12) FROM employes;
-- affiche le salaire annuel total de tous les employés
-- permet d'additionner des valeurs de champs differents.

-- Min et Max
SELECT MIN(salaire) FROM employes;    -- Affiche le salaire le plus faible
SELECT MAX(salaire) FROM employes;    -- Affiche le salaire le plus elevé

SELECT prenom, MAX(salaire) FROM employes; --fonctionne pas, MIN et MAX limité
-- pour cette Q: utiliser ORDER BY et LIMIT comme plus haut

SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

-- AVG (average)
SELECT AVG(salaire) FROM employes; -- affiche le salaire moyen de l'entreprise

-- ROUND
SELECT ROUND(AVG(salaire), 1) FROM employes; -- affiche le salaire moyen arrondi a 1 chiffre apres la virgule

-- COUNT
SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f'; -- Affiche le nombre de femmes

-- IN
SELECT prenom, service FROM employes WHERE service IN ('comptabilité', 'informatique'); -- affiche les employés appartenant a la comptabilité ou a l'informatique

-- NOT IN
SELECT prenom, service FROM employes WHERE service NOT IN ('comptabilité', 'informatique'); -- affiche les employés n'appartenant pas a la comptabilité ou a l'informatique

-- AND et OR
SELECT prenom, service FROM employes WHERE service = 'commercial' AND salaire <= 2000; -- Affiche les comerciaux dnt le salaire est inferieur a 2000. 

SELECT prenom, service FROM employes WHERE (service = 'commercial' AND salaire <= 1900) OR (salaire = 2300);

-- GROUP BY
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service; -- Affiche le nombre d'employes par services. Distribue les resultats du comptage dans les services corresepondants.

-- GROUP BY...HAVING
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1; -- affiche les services ou il y a plus d'un employé. Having remplace  Where dans GROUP BY


-- ******************************
-- Requettes d'insertion
-- ******************************
SELECT * FROM employes; -- On observe la table avant de la modifier

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'alexis', 'richy', 'm', 'informatique', '2011-12-28', 1800); -- Insertion d'un empoyé . Notez que l'ordre des champs enoncés entre les deux parentheses doit etre me même pour que les valeurs correspondent.

-- Une requette sans préciser les champs concernés
INSERT INTO employes VALUES(8059, 'test', 'test', 'm', 'test', '2012-12-28', 1800, 'valeur en trop');
-- insertion d'un employé sans préciser la liste de champs et si et seulement si le nombre et l'ordre des valeurs attendues sont respectées => ici valeur en trop donc pas pris

-- ******************************
-- Requettes de modification
-- *****************************
-- UPDATE
UPDATE employes SET Salaire = 1870 WHERE nom = 'cottet'; -- modifie le salaire.

UPDATE employes SET salaire = 1871 WHERE id_employes = 699; -- Il est recommandé de faire des modification sur les id car ils sotn uniques. Cela evite de modifier plusieurs enregistrements a la foi.

UPDATE employes SET salaire = 1872, service = "autre" WHERE id_employes = 699; 

UPDATE employes SET salaire = 1870; -- Le salaire de TOUS les employés deviens 1870 

-- REPLACE
REPLACE INTO employes (id_employes, prenom, nom,  sexe, service, date_embauche, salaire) VALUES (2006, 'test', 'test', 'm', 'marketing', 2010-07-05, 2600);
-- l'id 2000 n'existant pas, REPLACE se comporte en INSERT

REPLACE INTO employes (id_employes, prenom, nom,  sexe, service, date_embauche, salaire) VALUES (2006, 'test2', 'test2', 'm', 'marketing', '2010-07-05', 2601);

-- ******************************
-- Requettes de suppression
-- ******************************
-- DELETE
DELETE FROM employes WHERE id_employes = 900; -- suppression de l'employe dont l'id est 900

DELETE FROM employes WHERE service = 'informatique' AND id_employes != 802; --Supprime tous les informaticiens sauf 1 (id 802)
DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990;

-- A ne pas faire:
DELETE FROM employes;
--reviens a faire un TRUNCATR de table irreversible

-- ******************************
-- Exercices
-- ******************************

-- 1- Afficher le service de l'employé 547
SELECT service FROM employes WHERE id_employes = '547';

-- 2- Aficher la date d'embauche d'amandine
SELECT date_embauche FROM employes WHERE prenom = 'amandine';

-- 3- Afficher le nombre de commerciaux
SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

-- 4- Afficher le cout des commerciaux sur 1 an
SELECT SUM(Salaire * 12) FROM employes WHERE service = 'commercial';

-- 5- afficher le salaire moyen par service
SELECT service, AVG(salaire) FROM employes GROUP BY service;

-- 6- afficher le nombre de recrutements en 2010
SELECT COUNT(id_employes) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

-- 7- augmenter les salaires de chaque employés de 100
UPDATE employes SET salaire = (salaire + 100);

-- 8- afficher le nombre de services differents
SELECT COUNT(DISTINCT service) FROM employes;

-- 9- afficher le nombre d'employés par services
SELECT service, COUNT(id_employes)  FROM employes GROUP BY service;

-- 10- afficher les infos de l'employé du service informatique ayant le salaire le plus élevé
SELECT id_employes, nom, prenom, service, salaire, sexe, service, date_embauche FROM employes WHERE service = 'informatique' ORDER BY salaire DESC LIMIT 0,1;

-- 11- Afficher l'employé ayant été embauché en dernier
SELECT id_employes, nom, prenom, service, salaire, sexe, service, date_embauche FROM employes ORDER BY date_embauche DESC LIMIT 0,1;



