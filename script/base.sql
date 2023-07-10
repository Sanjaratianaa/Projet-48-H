create database regime;
\c regime

-- TABLES
    create table profil(
        id_profil SERIAL PRIMARY KEY,
        poids DOUBLE PRECISION,
        genre DOUBLE PRECISION,
        taille DOUBLE PRECISION,
        date_report DATETIME
    );

    create table utilisateur(
        id_utilisateur SERIAL PRIMARY KEY,
        nom VARCHAR(250),
        prenoms VARCHAR(250),
        mail VARCHAR(250),
        mot_de_passe VARCHAR(250),
        id_profil INT,
        foreign key (id_profil) references profil(id_profil)
    );

    create table administrateur(
        id_administrateur SERIAL PRIMARY KEY,
        mail VARCHAR(250),
        mot_de_passe VARCHAR(250)
    );

-- DATA
    -- PROFIL
    insert into profil values (1,'invite');
    insert into profil values (51,'admin');