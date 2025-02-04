-- Active: 1718787136001@@localhost@3306@exam_fin_s3
INSERT INTO exam_fin_s3_type_animal (espece, poids_min_vente, prix_kg, poids_max, nb_jour_sans_manger, pourcentage_perte_poids) 
VALUES 
('Boeuf', 400.00, 5.50, 900.00, 7, 3),
('Porc', 80.00, 4.00, 250.00, 5, 4),
('Poule', 1.50, 3.00, 5.00, 3, 6),  
('Canard', 2.00, 3.50, 6.00, 4, 5);


INSERT INTO exam_fin_s3_type_animal (espece, poids_min_vente, prix_kg, poids_max, nb_jour_sans_manger, pourcentage_perte_poids)  VALUES ('Bœuf', 500.00, 4.50, 900.00, 5, 10);
INSERT INTO exam_fin_s3_type_animal (espece, poids_min_vente, prix_kg, poids_max, nb_jour_sans_manger, pourcentage_perte_poids)  VALUES ('Porc', 100.00, 3.80, 250.00, 3, 8);
INSERT INTO exam_fin_s3_type_animal (espece, poids_min_vente, prix_kg, poids_max, nb_jour_sans_manger, pourcentage_perte_poids)  VALUES ('Mouton', 40.00, 6.00, 90.00, 4, 7);
INSERT INTO exam_fin_s3_type_animal (espece, poids_min_vente, prix_kg, poids_max, nb_jour_sans_manger, pourcentage_perte_poids)  VALUES ('Poulet', 1.50, 10.00, 4.00, 2, 5);
-- INSERT INTO exam_fin_s3_type_animal (espece, poids_min_vente, prix_kg, poids_max, nb_jour_sans_manger, pourcentage_perte_poids)  VALUES ('Chèvre', 35.00, 5.50, 85.00, 4, 6);


INSERT INTO exam_fin_s3_animal (id_type_animal, nombre, date_entree, poids_initial, prix_achat, image)  VALUES (1, 10, '2025-02-01', 550.00, 2475.00, 'boeuf1.jpg');
INSERT INTO exam_fin_s3_animal (id_type_animal, nombre, date_entree, poids_initial, prix_achat, image) VALUES (2, 15, '2025-01-28', 120.00, 456.00, 'porc1.jpg');
INSERT INTO exam_fin_s3_animal (id_type_animal, nombre, date_entree, poids_initial, prix_achat, image)  VALUES (3, 20, '2025-01-25', 50.00, 600.00, 'mouton1.jpg');
INSERT INTO exam_fin_s3_animal (id_type_animal, nombre, date_entree, poids_initial, prix_achat, image)  VALUES (4, 18, '2025-01-30', 40.00, 396.00, 'chevre1.jpg');
INSERT INTO exam_fin_s3_animal (id_type_animal, nombre, date_entree, poids_initial, prix_achat, image)  VALUES (5, 50, '2025-02-02', 2.00, 1000.00, 'poulet1.jpg');


INSERT INTO exam_fin_s3_aliment (id_type_animal, quantite, prix_unitaire)  VALUES (1, 500, 1.50);
INSERT INTO exam_fin_s3_aliment (id_type_animal, quantite, prix_unitaire)  VALUES (2, 300, 1.20);
INSERT INTO exam_fin_s3_aliment (id_type_animal, quantite, prix_unitaire)  VALUES (3, 200, 2.00);
INSERT INTO exam_fin_s3_aliment (id_type_animal, quantite, prix_unitaire)  VALUES (4, 180, 1.80);
INSERT INTO exam_fin_s3_aliment (id_type_animal, quantite, prix_unitaire)  VALUES (5, 1000, 0.80);


INSERT INTO exam_fin_s3_client (nom, prenom)  VALUES ('Dupont', 'Jean');
INSERT INTO exam_fin_s3_client (nom, prenom)  VALUES ('Martin', 'Sophie');
INSERT INTO exam_fin_s3_client (nom, prenom)  VALUES ('Bernard', 'Luc');
INSERT INTO exam_fin_s3_client (nom, prenom)  VALUES ('Robert', 'Claire');
INSERT INTO exam_fin_s3_client (nom, prenom)  VALUES ('Lefevre', 'Thomas');


INSERT INTO exam_fin_s3_vente_animal (id_client, id_animal, quantite, date_vente, prix_vente)  VALUES (1, 1, 2, '2025-02-05', 5000.00);
INSERT INTO exam_fin_s3_vente_animal (id_client, id_animal, quantite, date_vente, prix_vente)  VALUES (2, 2, 3, '2025-02-06', 1400.00);
INSERT INTO exam_fin_s3_vente_animal (id_client, id_animal, quantite, date_vente, prix_vente)  VALUES (3, 3, 5, '2025-02-07', 3200.00);
INSERT INTO exam_fin_s3_vente_animal (id_client, id_animal, quantite, date_vente, prix_vente)  VALUES (4, 4, 4, '2025-02-08', 2500.00);
INSERT INTO exam_fin_s3_vente_animal (id_client, id_animal, quantite, date_vente, prix_vente) VALUES (5, 5, 10, '2025-02-09', 800.00);


UPDATE exam_fin_s3_type_animal SET image = 'Boeuf.jpeg' WHERE id_type_animal = 1;
UPDATE exam_fin_s3_type_animal SET image = 'Porc.jpeg' WHERE id_type_animal = 2;
UPDATE exam_fin_s3_type_animal SET image = 'Poule.jpeg' WHERE id_type_animal = 3;
UPDATE exam_fin_s3_type_animal SET image = 'Canard.jpg' WHERE id_type_animal = 4;

