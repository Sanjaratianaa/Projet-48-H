--create database regime;
--\c regime

-- TABLES
    create table genre(
        id SERIAL PRIMARY KEY,
        designation VARCHAR(100)
    );

    create table utilisateur(
        id SERIAL PRIMARY KEY,
        nom VARCHAR(250),
        prenoms VARCHAR(250),
        mail VARCHAR(250),
        mot_de_passe VARCHAR(250)
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

alter table profil add column frequence_activite int;

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

    create table if not exists plat_aliment(
        id serial primary key,
        id_plat INT references plat(id),
        id_aliment INT references aliment(id),
        pourcentage DOUBLE PRECISION
    );

    create table if not exists regime(
        id serial primary key,
        designation VARCHAR(50),
        calorie_moyenne double precision
    );

    create table if not exists plat_regime(
        id serial primary key,
        id_regime INT references regime(id),
        id_plat INT references plat(id)
    );

    create table intensite_physique(
        id INT primary key,
        designation VARCHAR(100),
        inferieur DOUBLE PRECISION
    );

    --// TIME ou INT le duree ?
    create table activite (
        id serial primary key,
        designation VARCHAR(100),
        calorie_moyen DOUBLE PRECISION,
        id_intensite INT,
        duree TIME,
        foreign key (id_intensite) references intensite_physique(id)
    );

    create table if not exists code_argent (
        id VARCHAR(7) PRIMARY KEY,
        montant DOUBLE PRECISION
    );

    create table if not exists code_demande (
        id SERIAL PRIMARY KEY,
        id_utilisateur INT,
        id_code VARCHAR(7),
        date_demande DATE,
        foreign key (id_utilisateur) references utilisateur(id),
        foreign key (id_code) references code_argent(id)
    );

    create table if not exists code_validation (
        id SERIAL PRIMARY KEY,
        id_code_demande INT,
        id_administrateur INT,
        date_validation DATE,
        foreign key (id_code_demande) references code_demande(id), 
        foreign key (id_administrateur) references administrateur(id) 
    );

-- ALTER
    -- UTILISATEUR
    ALTER TABLE utilisateur add column date_naissance DATE;

    -- PROFIL
    alter table profil add column frequence_activite int;

-- VIEW
    -- ALIMENT
    create or replace view v_categorie_aliment as
        select a.id, a.id_categorie_aliment, c.designation as designation_categorie, a.designation as designation_aliment from aliment a join categorie_aliment c on a.id_categorie_aliment = c.id;

    create or replace view v_plat_regime as
        select pr.id, pr.id_plat, pr.id_regime, r.designation as designation_regime, p.designation as designation_plat from plat_regime pr join regime r on pr.id_regime = r.id join plat p on pr.id_plat = p.id;

    create or replace view v_code_valide as
        SELECT code_argent.* 
            FROM code_argent 
            LEFT JOIN 
                (SELECT code_demande.id_code FROM code_validation
                JOIN code_demande
                ON code_validation.id_code_demande = code_demande.id) sous_requete 
            ON code_argent.id = sous_requete.id_code WHERE sous_requete.id_code IS NULL;

    create or replace view v_code_invalide as
        SELECT code_argent.* 
            FROM code_argent 
            LEFT JOIN 
                (SELECT code_demande.id_code FROM code_validation
                JOIN code_demande
                ON code_validation.id_code_demande = code_demande.id) sous_requete 
            ON code_argent.id = sous_requete.id_code WHERE sous_requete.id_code IS NOT NULL;


    create or replace view v_profil as
        select profil.*, genre.designation sexe, extract(year from age(current_date, u.date_naissance)) AS age 
            from profil 
                join utilisateur u on profil.id_utilisateur = u.id 
                join genre on profil.genre = genre.id order by date_report;

    create view v_plat_aliment as
        select
            p.id id_plat, designation designation_plat, c_a.id aliment, designation_aliment,
            pourcentage, id_categorie_aliment, designation_categorie
                from plat_aliment
                    join v_categorie_aliment c_a on c_a.id = id_aliment
                    join plat p on plat_aliment.id_plat = p.id;