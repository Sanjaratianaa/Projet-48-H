--create database regime;
--\c regime

-- TABLES
    create table genre(
        id SERIAL PRIMARY KEY,
        designation VARCHAR(100)
    );

    create table profil(
        id SERIAL PRIMARY KEY,
        poids DOUBLE PRECISION,
        genre DOUBLE PRECISION,
        taille DOUBLE PRECISION,
        date_report DATE,
        id_utilisateur INT,
        foreign key (id_utilisateur) references utilisateur(id)
    );

    create table utilisateur(
        id SERIAL PRIMARY KEY,
        nom VARCHAR(250),
        prenoms VARCHAR(250),
        mail VARCHAR(250),
        mot_de_passe VARCHAR(250)
    );

    create table administrateur(
        id_administrateur SERIAL PRIMARY KEY,
        mail VARCHAR(250),
        mot_de_passe VARCHAR(250)
    );


    create table categorie_aliment(
        id SERIAL PRIMARY KEY,
        designation VARCHAR(50)
    );

    create table aliment(
        id SERIAL PRIMARY KEY,
        id_categorie_aliment INT references categorie_aliment(id),
        designation VARCHAR(50)
    );

    create table plat(
        id serial primary key,
        designation VARCHAR(50)
    );

    
-- ALTER
    -- UTILISATEUR
    ALTER TABLE utilisateur add column date_naissance DATE;

-- VIEW
    -- ALIMENT
    create view v_categorie_aliment as 
        select a.id, a.id_categorie_aliment, c.designation as designation_categorie, a.designation as designation_aliment from aliment a join categorie_aliment c on a.id_categorie_aliment = c.id;