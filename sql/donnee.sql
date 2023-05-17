INSERT INTO admins(emailadmin,mdpadmin) VALUES
('admin@gmail.com','admin');

CREATE VIEW v_laptop as 
select idlaptop,nomlaptop,prix,reference,ram,dur,image,marques.idmarque,marques.nommarque,processeurs.idprocesseur,processeurs.nomprocesseur
    from laptops 
    join marques on laptops.idmarque=marques.idmarque
    join processeurs on laptops.idprocesseur=processeurs.idprocesseur;    

CREATE VIEW v_user as SELECT iduser,nameuser,emailuser,mdpuser,magasins.idmagasin,magasins.nommagasin,magasins.lieu
    from users JOIN magasins on users.idmagasin=magasins.idmagasin;

CREATE VIEW v_stockslaptop as
 SELECT laptops.idlaptop,stockactuels.quantite,nomlaptop,prix,reference,ram,dur,image,marques.idmarque,marques.nommarque,processeurs.idprocesseur,processeurs.nomprocesseur
    from laptops 
    join marques on laptops.idmarque=marques.idmarque
    join processeurs on laptops.idprocesseur=processeurs.idprocesseur
    JOIN stockactuels on stockactuels.idlaptop=laptops.idlaptop;

CREATE VIEW v_stocksuspendu as
 SELECT laptops.idlaptop,stocksuspendumagasins.quantite,stocksuspendumagasins.idmagasin,stocksuspendumagasins.etat,nomlaptop,prix,reference,ram,dur,image,marques.idmarque,marques.nommarque,processeurs.idprocesseur,processeurs.nomprocesseur
    from laptops 
    join marques on laptops.idmarque=marques.idmarque
    join processeurs on laptops.idprocesseur=processeurs.idprocesseur
    JOIN stocksuspendumagasins on stocksuspendumagasins.idlaptop=laptops.idlaptop;

CREATE VIEW v_stockslaptopmag as
 SELECT laptops.idlaptop,stockactuelmagasins.quantite,stockactuelmagasins.idmagasin,nomlaptop,prix,reference,ram,dur,image,marques.idmarque,marques.nommarque,processeurs.idprocesseur,processeurs.nomprocesseur
    from laptops 
    join marques on laptops.idmarque=marques.idmarque
    join processeurs on laptops.idprocesseur=processeurs.idprocesseur
    JOIN stockactuelmagasins on stockactuelmagasins.idlaptop=laptops.idlaptop;
    