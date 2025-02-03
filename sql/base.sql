-- Active: 1718787136001@@localhost@3306@exam_fin_s3
create DATABASE exam_fin_s3;
use exam_fin_s3;
create table exam_fin_s3_type_animal (
    id_type_animal int primary key auto_increment,
    espece varchar(255) not null,
    poids_min_vente decimal(10,2) not null,
    prix_kg decimal(10,2) not null,
    poids_max decimal(10,2) not null,
    nb_jour_sans_manger int,
    pourcentage_perte_poids int,
    image varchar(255)
);

CREATE TABLE exam_fin_s3_animal (
    id_animal int primary key auto_increment,
    id_type_animal int,
    nombre int,
    date_entree date,
    poids_initial decimal(10,2),
    prix_achat decimal(10,2),
    FOREIGN KEY (id_type_animal) REFERENCES exam_fin_s3_type_animal(id_type_animal)
);

CREATE TABLE exam_fin_s3_aliment (
    id_aliment int primary key auto_increment,
    id_type_animal int,
    quantite int,
    prix_unitaire decimal(10,2),
    date_ajout date,
    FOREIGN KEY (id_type_animal) REFERENCES exam_fin_s3_type_animal(id_type_animal)
);

-- DROP TABLE exam_fin_s3_aliment;

-- CREATE TABLE alimentation (
--     id_alimentation int primary key auto_increment,
--     id_animal int,
--     id_aliment int,
--     quantite int,
--     date_alimentation date,
--     FOREIGN KEY (id_animal) REFERENCES animal(id_animal),
--     FOREIGN KEY (id_aliment) REFERENCES aliment(id_aliment)
-- );

CREATE TABLE exam_fin_s3_client(
    id_client int primary key auto_increment,
    nom varchar(255),
    prenom varchar(255)
);

CREATE TABLE exam_fin_s3_vente_animal (
    id_vente_animal int primary key auto_increment,
    id_client int,
    id_animal int,
    quantite int,
    date_vente date,
    prix_vente decimal(10,2),
    FOREIGN KEY (id_client) REFERENCES exam_fin_s3_client(id_client),
    FOREIGN KEY (id_animal) REFERENCES exam_fin_s3_animal(id_animal)
);

