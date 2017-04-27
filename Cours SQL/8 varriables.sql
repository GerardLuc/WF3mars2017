-- *************************************
-- Variables en SQL
-- *************************************
-- Une variable est un es)pace mémoire nommé qui permet de conserver une valeur

SHOW VARIABLES;

SELECT @@version; -- 2 @ pour acceder a une variable systeme.

--  Dererminer nos propres variables
SET @ecole = 'WF3';
SELECT @ecole;