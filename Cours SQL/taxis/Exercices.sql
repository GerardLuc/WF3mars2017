-- *********************************
-- Exercices
-- *********************************

-- 1 Qui conduit la voiture d'id_vehicule 503?
SELECT c.prenom
FROM conducteur c
INNER JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
WHERE a.id_vehicule = '503';

-- 2 Qui (prénom) conduit quel modele
SELECT c.prenom, v.modele
FROM conducteur c
INNER JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
INNER JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;


-- 3 Inserez-vous dans la table conducteur. Puis afficher tous les conducteurs (même ceux sans vehicule affecté) ainsi que les modeles de véhicules
INSERT INTO conducteur (id_conducteur, prenom, nom) VALUES ('6', 'Luc', 'Gerard');
SELECT c.prenom, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;


-- 4 Ajoutez l'enregistrement suivant:
INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES ('Renault', 'Espace', 'noir', 'ZE-123-RT');
-- Puis afficher tous les modeles de vehicules, y compris ceux qui n'ont pas de chauffeur affectés, et le prénom des conducteurs.
INSERT INTO conducteur (id_conducteur, prenom, nom) VALUES ('6', 'Luc', 'Gerard');
SELECT c.prenom, v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
RIGHT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;

-- 5 Afficher les prenoms des chauffeurs (y compris ceux qui n'ont pas de vehicules affectés) et tous les modeles de voitures (y compris ceux qui n'ont pas de chauffeur)
(SELECT c.prenom, c.nom, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule)
UNION
(SELECT c.prenom, c.nom, v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
RIGHT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule);