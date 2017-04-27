-- ************************
-- fonctions prédéfinies
-- ************************

-- Fonction prrédéfinies: prévue par le language SOl, et executée par le developpeur


-- Dernier id inseré
INSERT INTO abonne (prenom) VALUES ('test');
SELECT LAST_INSERT_ID();

-- Fonctions de dates
SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_rendu_fr FROM emprunt; -- met les dates de champs date_rendu_fr

SELECT NOW(); -- Affiche la date et l'heure en cours

SELECT CURDATE();
SELECT CURTIME();

-- Crypter un mot de passe avec l'algorythme ASS:
SELECT PASSWORD('mypass'); -- affiche mypass
INSERT INTO abonne (prenom) VALUES(PASSWORD(mypass)); -- affiche le msd crypté en base


-- Concaténation
SELECT CONCAT('a','b','c'); --concatène 3 chaines de caracteres
SELECT CONCAT_WS(' - ', 'a', 'b', 'c'); --concatene avec un séparateur

-- Fonction sur les chaines de caracteres:
SELECT SUBSTRING('bonjour', '1' ,'3'); -- Affiche 'bon': compte 3 a partir de la position 1
SELECT TRIM('    coucou.     ');  --spprime les espaces avant et apres la chaince de caracteres

-- sources: sql.sh