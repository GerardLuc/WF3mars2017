-- **********************************
-- TRANSITIONS
-- **********************************

-- une transition permet de lancer des requettes telles que les modificaztions, et de les anuller si besoin

-- transaction simple:
START TRANSACTION; --démarre la transaction
    SELECT * FROM employes;
    UPDATE employes SET prenom = 'ALLO' WHERE id_employes = '739';

ROLLBACK; -- annuler

COMMIT; -- valider

-- Si on ne fait ni rollback ni commit avant la, deco du sgbd, c'est un rollback qui s'effectue par défaut

-- Transaction avancée

START TRANSACTION;
    SAVEPOINT point1;
    UPDATE employes, SET prenom = 'Julien A' WHERE id_employes = '699';
    SAVEPOINT point2;
    UPDATE employes, SET prenom = 'Julien B' WHERE id_employes = '699';

ROLLBACK TO point2; -- Annule la transfo en julien B;

-- ou bien
ROLLBACK; -- tout annuler.

-- Mieux
COMMIT; -- tout valider