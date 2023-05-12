INSERT INTO users(nameuser,emailuser,mdpuser) VALUES
('Mikaelson','k@gmail.com','klaus');
INSERT INTO users(nameuser,emailuser,mdpuser) VALUES
('Mikaelson','e@gmail.com','Elijah');

   INSERT INTO Categories(nomcategorie) VALUES 
   ('informatique'),
   ('sante'),
   ('nourriturre');

   INSERT INTO Produits(nomproduit,idcategorie,prix, detail,image) VALUES ('asus f15',1,1000,'edtail','produits/1682102116.png');
   INSERT INTO Produits(nomproduit,idcategorie,prix, detail,image) VALUES ('smart watch',1,500,'android 10','produits/1682141620.png');

   INSERT INTO Stocks(idproduit,quantite,unite) VALUES (1,20,'piece');
   INSERT INTO Stocks(idproduit,quantite,unite) VALUES (2,40,'piece');
   