-- **********************************
-- requettes préparées
-- **********************************
-- Interpretation / Execution. La préparation de la requette consiste a réaliser les etapes d'analyse et d'interpretation. Ensuite on effectue l'execution a part.

-- La séparation des phases permet des gains de merformances quand une requette doit etre effectruée une multitude de fois. En effecute qu'une seule fois les deux premieres phases et X fois la derniere.

-- Requette préparée sans marqueur:
-- 1° Préparation:
PREPARE req FROM "SELECT * FROM employes WHERE service = 'commercial'"; -- Déclarer une requette préparée

-- 2° Execution de la requette:
EXECUTE req;
-- On peut executer la requette plusieurs fois sans refaire le cycle analyse/interpretation ce qui implique un gain de performance.

-- Requette préparée avec un marqueur "?":
PREPARE req2 FROM "SELECT * FROM employes WHERE prenom = ?"; -- Le "?" est un marqueur qui attends une valeur

-- 2° Execution
SET @prenom = 'Emilie'; -- Déclare et affecte la variable prenom
EXECUTE req2 USING @prenom; -- on execute la requette en utilisant la variable prenom.

-- Supprimer une requette préparée
DROP PREPARE req2;


-- Les requetes préparées ont une durrée de vie courte: elles sont supprimées des que l'on quitte la session.

