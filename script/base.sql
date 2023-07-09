create database projet;
\c projet

-- TABLES
    create table profil(
        id_profil INT PRIMARY KEY,
        nom VARCHAR(250)
    );

    create table utilisateur(
        id_utilisateur SERIAL PRIMARY KEY,
        nom VARCHAR(250),
        mail VARCHAR(250),
        mot_de_passe VARCHAR(250),
        id_profil INT,
        foreign key (id_profil) references profil(id_profil)
    );

-- DATA
    -- PROFIL
    insert into profil values (1,'user');
    insert into profil values (51,'admin');