DROP DATABASE IF EXISTS KSAV;

CREATE DATABASE IF NOT EXISTS KSAV;
USE KSAV;
# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS utilisateur
 (
   IDUTILISATEUR INTEGER NOT NULL AUTO_INCREMENT ,
   NOM VARCHAR(128) NULL  ,
   MDP VARCHAR(255) NULL  
   , PRIMARY KEY (IDUTILISATEUR) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : AVIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS avis
 (
   IDAVIS INTEGER NOT NULL AUTO_INCREMENT ,
   POINTSPOSITIFS VARCHAR(128) NULL  ,
   POINTSNEGATIFS VARCHAR(128) NULL  ,
   DATEAVIS DATE NULL  
   , PRIMARY KEY (IDAVIS) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : PRESTATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS prestation
 (
   IDPRESTATION INTEGER NOT NULL AUTO_INCREMENT ,
   LIBELLE CHAR(32) NULL  ,
   DESCRIPTION VARCHAR(255) NULL  
   , PRIMARY KEY (IDPRESTATION) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS client
 (
   IDCLIENT INTEGER NOT NULL AUTO_INCREMENT ,
   NOM CHAR(32) NOT NULL  ,
   PRENOM CHAR(32) NULL  ,
   ADRESSE VARCHAR(128) NULL  ,
   EMAIL CHAR(32) NULL  ,
   TEL CHAR(32) NULL  
   , PRIMARY KEY (IDCLIENT) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : TYPEVOYAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS typevoyage
 (
   IDTYPEVOYAGE INTEGER NOT NULL AUTO_INCREMENT ,
   LIBELLE VARCHAR(128) NOT NULL  ,
   DESCRIPTION VARCHAR(255) NULL  
   , PRIMARY KEY (IDTYPEVOYAGE) 
 ) 
 ENGINE=InnoDB;


# -----------------------------------------------------------------------------
#       TABLE : TOUROPERATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS touroperateur
 (
   IDTOUROPERATEUR INTEGER NOT NULL AUTO_INCREMENT ,
   LIBELLE VARCHAR(128) NOT NULL
   , PRIMARY KEY (IDTOUROPERATEUR)
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : RESERVATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS reservation
 (
   IDRESERVATION CHAR(32) NOT NULL  ,
   IDVOYAGE INTEGER NOT NULL  ,
   IDCLIENT INTEGER NOT NULL  ,
   IDAVIS INTEGER NOT NULL  
   , PRIMARY KEY (IDRESERVATION) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RESERVATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RESERVATION_VOYAGE
     ON reservation (IDVOYAGE ASC);

CREATE  INDEX I_FK_RESERVATION_CLIENT
     ON reservation (IDCLIENT ASC);

CREATE  INDEX I_FK_RESERVATION_AVIS
     ON reservation (IDAVIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : MODELEVOYAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS modelevoyage
 (
   IDMODELEVOYAGE INTEGER NOT NULL AUTO_INCREMENT ,
   IDTYPEVOYAGE INTEGER NOT NULL  ,
   IDTOUROPERATEUR INTEGER NOT NULL  ,
   NOM CHAR(32) NULL  ,
   DESCRIPTION VARCHAR(255) NULL  ,
   DESTINATION VARCHAR(128) NOT NULL 
   , PRIMARY KEY (IDMODELEVOYAGE) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MODELEVOYAGE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MODELEVOYAGE_TYPEVOYAGE
     ON modelevoyage (IDTYPEVOYAGE ASC);

CREATE  INDEX I_FK_MODELEVOYAGE_TOUROPERATEUR
     ON modelevoyage (IDTOUROPERATEUR ASC);

# -----------------------------------------------------------------------------
#       TABLE : VOYAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS voyage
 (
   IDVOYAGE INTEGER NOT NULL AUTO_INCREMENT ,
   IDMODELEVOYAGE INTEGER NOT NULL  ,
   DATEDEPART DATE NOT NULL  
   , PRIMARY KEY (IDVOYAGE) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VOYAGE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VOYAGE_MODELEVOYAGE
     ON voyage (IDMODELEVOYAGE ASC);

# -----------------------------------------------------------------------------
#       TABLE : POSSEDER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS posseder
 (
   IDPRESTATION INTEGER NOT NULL  ,
   IDMODELEVOYAGE INTEGER NOT NULL  
   , PRIMARY KEY (IDPRESTATION,IDMODELEVOYAGE) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE POSSEDER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_POSSEDER_PRESTATION
     ON posseder (IDPRESTATION ASC);

CREATE  INDEX I_FK_POSSEDER_MODELEVOYAGE
     ON posseder (IDMODELEVOYAGE ASC);

# -----------------------------------------------------------------------------
#       TABLE : NOTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS note
 (
   IDPRESTATION INTEGER NOT NULL  ,
   IDAVIS INTEGER NOT NULL  ,
   NOTE CHAR(32) NULL  
   , PRIMARY KEY (IDPRESTATION,IDAVIS) 
 ) 
 ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE NOTE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_NOTE_PRESTATION
     ON note (IDPRESTATION ASC);

CREATE  INDEX I_FK_NOTE_AVIS
     ON note (IDAVIS ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE reservation 
  ADD FOREIGN KEY FK_RESERVATION_VOYAGE (IDVOYAGE)
      REFERENCES voyage (IDVOYAGE)
      ON DELETE CASCADE;


ALTER TABLE reservation 
  ADD FOREIGN KEY FK_RESERVATION_CLIENT (IDCLIENT)
      REFERENCES client (IDCLIENT)
      ON DELETE CASCADE;


ALTER TABLE reservation 
  ADD FOREIGN KEY FK_RESERVATION_AVIS (IDAVIS)
      REFERENCES avis (IDAVIS)
      ON DELETE CASCADE;


ALTER TABLE modelevoyage 
  ADD FOREIGN KEY FK_MODELEVOYAGE_TYPEVOYAGE (IDTYPEVOYAGE)
      REFERENCES typevoyage (IDTYPEVOYAGE)
      ON DELETE CASCADE;

ALTER TABLE modelevoyage 
  ADD FOREIGN KEY FK_MODELEVOYAGE_TOUROPERATEUR (IDTOUROPERATEUR)
      REFERENCES touroperateur (IDTOUROPERATEUR)
      ON DELETE CASCADE;

ALTER TABLE voyage 
  ADD FOREIGN KEY FK_VOYAGE_MODELEVOYAGE (IDMODELEVOYAGE)
      REFERENCES modelevoyage (IDMODELEVOYAGE)
      ON DELETE CASCADE;


ALTER TABLE posseder 
  ADD FOREIGN KEY FK_POSSEDER_PRESTATION (IDPRESTATION)
      REFERENCES prestation (IDPRESTATION)
      ON DELETE CASCADE;


ALTER TABLE posseder 
  ADD FOREIGN KEY FK_POSSEDER_MODELEVOYAGE (IDMODELEVOYAGE)
      REFERENCES modelevoyage (IDMODELEVOYAGE)
      ON DELETE CASCADE;


ALTER TABLE note 
  ADD FOREIGN KEY FK_NOTE_PRESTATION (IDPRESTATION)
      REFERENCES prestation (IDPRESTATION) 
      ON DELETE CASCADE;


ALTER TABLE note 
  ADD FOREIGN KEY FK_NOTE_AVIS (IDAVIS)
      REFERENCES avis (IDAVIS)
      ON DELETE CASCADE;

