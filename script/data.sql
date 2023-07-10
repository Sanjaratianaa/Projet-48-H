-- DATA
    -- GENRE
        insert into genre values(default,'Femme');
        insert into genre values(default,'Masculin');

    -- ADMINISTRATEUR
        insert into administrateur values(default,'admin@gmail.com','admin');

    -- CATEGORIE ALIMENT
        insert into categorie_aliment values(default,'Laitier');
        insert into categorie_aliment values(default,'Viande Rouge');
        insert into categorie_aliment values(default,'Viande Blanche');
        insert into categorie_aliment values(default,'Legume');
        insert into categorie_aliment values(default,'Fruit');
        insert into categorie_aliment values(default,'Cereale');

    -- ALIMENT
        -- LAITIER
        insert into aliment values(default,1,'Lait');
        insert into aliment values(default,1,'Yaourt');
        insert into aliment values(default,1,'Fromage');
        insert into aliment values(default,1,'Fromage Blanc');
        insert into aliment values(default,1,'Lait fermente');

        -- VIANDES ROUGES
        insert into aliment values(default,2,'Filet de Boeuf');
        insert into aliment values(default,2,'Venaison');
        insert into aliment values(default,2,'Steak de Surlonge');
        insert into aliment values(default,2,'Roti de boeuf maigre');

        -- VIANDES BLANCHES
        insert into aliment values(default,3,'Blanc de Poulet');
        insert into aliment values(default,3,'Dinde');
        insert into aliment values(default,3,'Morue');
        insert into aliment values(default,3,'Tilapia');
        insert into aliment values(default,3,'Merlan');
        insert into aliment values(default,3,'Sole');
        insert into aliment values(default,3,'Filet de porc');

        -- LEGUMES
        insert into aliment values(default,4,'Brocoli');
        insert into aliment values(default,4,'Courgettes');
        insert into aliment values(default,4,'Chou-Fleur');
        insert into aliment values(default,4,'Laitue');
        insert into aliment values(default,4,'Epinards');
        insert into aliment values(default,4,'Carottes');
        insert into aliment values(default,4,'Haricots Verts');
        insert into aliment values(default,4,'Tomates');
        insert into aliment values(default,4,'Carottes');
        insert into aliment values(default,4,'Champignons');

        -- FRUIT
        insert into aliment values(default,5,'Pommes');
        insert into aliment values(default,5,'Bananes');
        insert into aliment values(default,5,'Fraises');
        insert into aliment values(default,5,'Oranges');
        insert into aliment values(default,5,'Baies');
        insert into aliment values(default,5,'Ananas');
        insert into aliment values(default,5,'Poires');
        insert into aliment values(default,5,'Raisins');
        insert into aliment values(default,5,'Avocat');

        -- CEREALE
        insert into aliment values(default,6,'Avoine');
        insert into aliment values(default,6,'Quinoa');
        insert into aliment values(default,6,'Riz Brun');
        insert into aliment values(default,6,'Millet');
        insert into aliment values(default,6,'Ble complet');
        insert into aliment values(default,6,'Kamut');

    -- PLAT
    insert into plat values(default,'Salade de poulet grille');
    insert into plat values(default,'Salade de poulet grille avec des legumes');
    insert into plat values(default,'Salade de legumes grille avec fromage');
    insert into plat values(default,'Chili vegetarien aux haricots');
    insert into plat values(default,'Salade de thon avec avocat');
    insert into plat values(default,'Porc grille avec salade de chou-Fleur');
    insert into plat values(default,'Smoothie aux baies et a l''avoine');
    insert into plat values(default,'Quinoa aux legumes et a la dinde');