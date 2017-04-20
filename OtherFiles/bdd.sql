#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        identifiant        Varchar (25) ,
        password           Varchar (255) ,
        droit              Int ,
        id                 int (11) Auto_increment  NOT NULL ,
        mail               Varchar (25) ,
        hash_validation    Char (32) NOT NULL ,
        avatar             Varchar (128) NOT NULL ,
        promotion          Varchar (250) ,
        confirmation_token Varchar (60) ,
        coonfirmed_at      Date ,
        remember_token     Varchar (250) ,
        PRIMARY KEY (id ) ,
        UNIQUE (identifiant ,mail )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: posts
#------------------------------------------------------------

CREATE TABLE posts(
        slug    Varchar (255) ,
        name    Varchar (255) ,
        id      Int NOT NULL ,
        content Longtext ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: products
#------------------------------------------------------------

CREATE TABLE products(
        id    Int NOT NULL ,
        name  Varchar (255) ,
        price Float ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Panier
#------------------------------------------------------------

CREATE TABLE Panier(
        libelleProduit Varchar (128) NOT NULL ,
        qteProduit     Int NOT NULL ,
        prixProduit    Varchar (25) NOT NULL ,
        id             Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: image
#------------------------------------------------------------

CREATE TABLE image(
        image   Varchar (25) NOT NULL ,
        idPhoto Int NOT NULL ,
        PRIMARY KEY (idPhoto )
)ENGINE=InnoDB;

ALTER TABLE Panier ADD CONSTRAINT FK_Panier_id FOREIGN KEY (id) REFERENCES products(id);
