INSERT INTO agence_immobiliere_type_habitation (type) VALUES 
('Maison'),
('Studio'),
('Appartement'),
('Villa'),
('Duplex');

INSERT INTO agence_immobiliere_quartier (nom_quartier) VALUES 
('Ambohimangakely'),
('Ankadifotsy'),
('Andoharanofotsy'),
('Ambatobe'),
('Talatamaty');

INSERT INTO agence_immobiliere_image (path) VALUES 
('img1.jpg'),
('img2.jpg'),
('img3.jpg'),
('img4.jpg'),
('img5.jpg'),
('img6.jpg'),
('img7.jpg'),
('img8.jpg'),
('img9.jpg'),
('img10.jpg');

INSERT INTO agence_immobiliere_habitation (id_type, nb_chambres, loyer_par_jour, id_quartier, description) VALUES
(1, 3, 75000.00, 1, 'Maison spacieuse avec un grand jardin, idéale pour une famille. Située à Ambohijatovo.'),
(2, 1, 30000.00, 2, 'Studio moderne et bien équipé, parfait pour une personne seule ou un couple. Situé à Ankadifotsy.'),
(3, 2, 50000.00, 3, 'Appartement confortable avec un balcon offrant une belle vue. Situé à Ambanidia.'),
(1, 4, 100000.00, 4, 'Grande maison traditionnelle avec terrasse et espace pour animaux. Située à Andravoahangy.'),
(2, 1, 28000.00, 5, 'Studio minimaliste et fonctionnel, à proximité des commodités. Situé à Isotry.'),
(4, 6, 120000.00, 1, 'Villa de luxe avec piscine, idéale pour des séjours haut de gamme. Située à Ambohijatovo.'),
(3, 3, 80000.00, 2, 'Appartement moderne avec cuisine équipée et parking sécurisé. Situé à Ankadifotsy.'),
(5, 2, 70000.00, 3, 'Bungalow charmant, parfait pour des vacances au calme. Situé à Ambanidia.'),
(1, 2, 60000.00, 4, 'Maison traditionnelle rénovée, proche des écoles et marchés. Située à Andravoahangy.'),
(4, 5, 110000.00, 5, 'Villa spacieuse avec jardin et parking, idéale pour une grande famille. Située à Isotry.');

INSERT INTO agence_immobiliere_image_habitation (id_image, id_habitation) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);
