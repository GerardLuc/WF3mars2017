-- ****************************
-- Table virtuelles: vues
-- ****************************
-- Les vues (ou tables virtuelles) sont des objets de la base de données, constitué d'un nom, et d'nue requette de selection.

-- Une fois une vue definie, on peut l'utiliser comme on le ferait avec une table, laquelle serait constituée de dpnnées selectionnées par la requete definissant la vue

USE entreprise;

-- Création d'une vue
CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe= 'm'; --créée une table virtuelle(ou vue) remplie avec les donnees de SELECT

-- Une seconde reqquete effectuee sur la vue:
SELECT prenom FROM vue_homme;

--Si il ya a un changement dans la table d'origine, la vue est corrigée dynamiquement car elle enregistre la requette SELECT qui pointe vers la table d'origine. Inversement, si il y a un changement dans la table da,s la table virtuelle, il s'impacte dans la table d'origine.
-- 'Il y a interet a faire des vues en terme de gain de ressources, ou quand il y a des requetes complexes a executer.

SHOW TABLES;
DROP VIEW vue_homme;

-- ***************************
-- Tables temporaires
-- ***************************
-- Créer ine table temporaire:

CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = 'f';
-- Créée une table temporaire qui s'efface lorsqu'on se deconecte, et n'est pas visible avec show tables.
