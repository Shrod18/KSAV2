DROP DATABASE IF EXISTS KSAV;

CREATE DATABASE IF NOT EXISTS KSAV;
USE KSAV;
# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILISATEUR
 (
   IDUTILISATEUR INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NOM VARCHAR(128) NULL  ,
   MDP VARCHAR(255) NULL  
   , PRIMARY KEY (IDUTILISATEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : AVIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AVIS
 (
   IDAVIS INTEGER(2) NOT NULL AUTO_INCREMENT ,
   IDRESERVATION INTEGER(2) NOT NULL  ,
   IDVOYAGE INTEGER(2) NOT NULL  ,
   IDCLIENT INTEGER(2) NOT NULL  ,
   TRANSFERT CHAR(32) NULL  
      DEFAULT "N/A",
   HOTEL CHAR(32) NULL  
      DEFAULT "N/A",
   RESTAURATION CHAR(32) NULL  
      DEFAULT "N/A",
   SERVICEACCUEIL CHAR(32) NULL  
      DEFAULT "N/A",
   ANIMATION CHAR(32) NULL  
      DEFAULT "N/A",
   EXCURSIONSGUIDE CHAR(32) NULL  
      DEFAULT "N/A",
   TRANSPORTAERIEN CHAR(32) NULL  
      DEFAULT "N/A",
   TRANSPORTCAR CHAR(32) NULL  
      DEFAULT "N/A",
   THALASSOSPA CHAR(32) NULL  
      DEFAULT "N/A",
   CROISIERE CHAR(32) NULL  
      DEFAULT "N/A",
   POSITIFS VARCHAR(255) NULL  ,
   NEGATIF VARCHAR(255) NULL  ,
   DATEAVIS DATE NULL  
   , PRIMARY KEY (IDAVIS,IDRESERVATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE AVIS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_AVIS_VOYAGE
     ON AVIS (IDVOYAGE ASC);

CREATE  INDEX I_FK_AVIS_CLIENT
     ON AVIS (IDCLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : PRESTATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PRESTATION
 (
   IDPRESTATION INTEGER(2) NOT NULL AUTO_INCREMENT ,
   LIBELLE CHAR(32) NULL  ,
   DESCRIPTION VARCHAR(255) NULL  
   , PRIMARY KEY (IDPRESTATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   IDCLIENT INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NOM CHAR(32) NOT NULL  ,
   PRENOM CHAR(32) NULL  ,
   ADRESSE VARCHAR(128) NULL  ,
   EMAIL CHAR(32) NULL  ,
   TEL CHAR(32) NULL  
   , PRIMARY KEY (IDCLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TYPEVOYAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPEVOYAGE
 (
   IDTYPEVOYAGE INTEGER(2) NOT NULL AUTO_INCREMENT ,
   LIBELLE VARCHAR(128) NOT NULL  ,
   DESCRIPTION VARCHAR(255) NULL  
   , PRIMARY KEY (IDTYPEVOYAGE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : MODELEVOYAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MODELEVOYAGE
 (
   IDMODELEVOYAGE INTEGER(2) NOT NULL AUTO_INCREMENT ,
   IDTYPEVOYAGE INTEGER(2) NOT NULL  ,
   NOM CHAR(32) NULL  ,
   DESCRIPTION VARCHAR(255) NULL  ,
   DESTINATION VARCHAR(128) NOT NULL  
   , PRIMARY KEY (IDMODELEVOYAGE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MODELEVOYAGE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MODELEVOYAGE_TYPEVOYAGE
     ON MODELEVOYAGE (IDTYPEVOYAGE ASC);

# -----------------------------------------------------------------------------
#       TABLE : VOYAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VOYAGE
 (
   IDVOYAGE INTEGER(2) NOT NULL AUTO_INCREMENT ,
   IDMODELEVOYAGE INTEGER(2) NOT NULL  ,
   DATEDEPART DATE NOT NULL  
   , PRIMARY KEY (IDVOYAGE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VOYAGE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VOYAGE_MODELEVOYAGE
     ON VOYAGE (IDMODELEVOYAGE ASC);

# -----------------------------------------------------------------------------
#       TABLE : POSSEDER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS POSSEDER
 (
   IDPRESTATION INTEGER(2) NOT NULL  ,
   IDMODELEVOYAGE INTEGER(2) NOT NULL  
   , PRIMARY KEY (IDPRESTATION,IDMODELEVOYAGE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE POSSEDER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_POSSEDER_PRESTATION
     ON POSSEDER (IDPRESTATION ASC);

CREATE  INDEX I_FK_POSSEDER_MODELEVOYAGE
     ON POSSEDER (IDMODELEVOYAGE ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE AVIS 
  ADD FOREIGN KEY FK_AVIS_VOYAGE (IDVOYAGE)
      REFERENCES VOYAGE (IDVOYAGE) ;


ALTER TABLE AVIS 
  ADD FOREIGN KEY FK_AVIS_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE MODELEVOYAGE 
  ADD FOREIGN KEY FK_MODELEVOYAGE_TYPEVOYAGE (IDTYPEVOYAGE)
      REFERENCES TYPEVOYAGE (IDTYPEVOYAGE) ;


ALTER TABLE VOYAGE 
  ADD FOREIGN KEY FK_VOYAGE_MODELEVOYAGE (IDMODELEVOYAGE)
      REFERENCES MODELEVOYAGE (IDMODELEVOYAGE) ;


ALTER TABLE POSSEDER 
  ADD FOREIGN KEY FK_POSSEDER_PRESTATION (IDPRESTATION)
      REFERENCES PRESTATION (IDPRESTATION) ;


ALTER TABLE POSSEDER 
  ADD FOREIGN KEY FK_POSSEDER_MODELEVOYAGE (IDMODELEVOYAGE)
      REFERENCES MODELEVOYAGE (IDMODELEVOYAGE) ;

